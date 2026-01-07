<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Buyer\Buyer;
use App\Models\Seller\Seller;
use App\Models\Buyer\BuyerDocumentation;
use App\Models\Seller\SellerDocumentation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('MarketPlace.login.login');
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput($request->only('email'));
        }
        // Jika ada lebih dari 1 record untuk email yang sama (mis. pernah ditolak lalu daftar ulang),
        // prioritaskan yang statusnya paling tinggi (2 aktif > 1 pending > 0 ditolak).
        $user = User::where('email', $request->email)
            ->orderByDesc('status')
            ->orderByDesc('user_id')
            ->first();
        if (!$user || !Hash::check($request->password, $user->password_hash)) {
            return back()
                ->withErrors(['email' => 'Email atau password salah.'])
                ->withInput($request->only('email'));
        }
        
        // DEBUG: Logging sementara untuk melihat nilai status yang sebenarnya
        \Log::info('Login attempt', [
            'email' => $user->email,
            'user_id' => $user->user_id,
            'status_raw' => $user->getAttributes()['status'],
            'status_cast' => $user->status,
            'status_int' => (int) $user->status,
            'is_active' => ((int) $user->status === 2),
        ]);
        
        if ((int) $user->status !== 2) {
            // Arahkan ke halaman status akun tanpa navbar/footer
            return redirect()->route('account.status', ['email' => $user->email]);
        }
        $user->last_login = now();
        $user->save();
        Auth::login($user, $request->filled('remember'));
        // Redirect users to role-specific dashboard
        return $this->redirectBasedOnRole($user->role);
    }

    public function showRegisterForm()
    {
        return view('MarketPlace.register.register');
    }
    public function showRegisterSuccess()
    {
        return view('MarketPlace.register.register-success');
    }

    public function showAccountStatus(Request $request)
    {
        $email = (string) $request->query('email', '');
        if ($email === '') {
            return redirect()->route('login');
        }

        $user = User::where('email', $email)
            ->orderByDesc('status')
            ->orderByDesc('user_id')
            ->first();

        if (!$user) {
            return redirect()->route('login')
                ->withErrors(['email' => 'Akun tidak ditemukan. Silakan coba login kembali.']);
        }

        return view('MarketPlace.account.status', [
            'email' => $user->email,
            'role' => $user->role,
            'status' => (int) $user->status,
        ]);
    }
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'account_type' => 'required|in:buyer,seller',
            'company_name' => 'required|string|max:255',
            'company_email' => [
                'required',
                'email',
                // Hanya blokir email yang sudah dipakai akun dengan status != 0 (pending/aktif).
                Rule::unique('users', 'email')->where(function ($query) {
                    return $query->where('status', '!=', 0);
                }),
            ],
            'phone' => 'required|string|max:20',
            'industry' => 'required|string',
            'address' => 'required|string',
            'full_name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
            'nib_number' => 'nullable|string|max:255',
            'npwp_number' => 'nullable|string|max:255',
            'website' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'country' => 'nullable|string|max:255',
            'akta' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10240',
            'npwp' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10240',
            'nib' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10240',
            'iso' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10240',
            'gold_standard' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10240',
            'vcs' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10240',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput($request->except('password', 'password_confirmation'));
        }

        try {
            DB::beginTransaction();
            $profilePhotoPath = null;
            if ($request->filled('profile_photo')) {
                $profilePhotoPath = $this->saveBase64Image($request->profile_photo, 'profile_photos');
                \Log::info('Profile photo saved during registration', ['profilePhotoPath' => $profilePhotoPath]);
            }
            $user = User::create([
                'email' => $request->company_email,
                'photo_url' => $profilePhotoPath ?: 'urlProfil/User1.gif',
                'password_hash' => Hash::make($request->password),
                'role' => $request->account_type,
                'status' => 1, // 1 = pending
                'created_at' => now(),
                // Kolom last_login di DB tidak nullable, isi awal sama dengan waktu registrasi
                'last_login' => now(),
            ]);
            if ($request->account_type === 'buyer') {
                $buyer = Buyer::create([
                    'user_id' => $user->user_id,
                    'company_name' => $request->company_name,
                    'country' => $request->country ?? 'Indonesia',
                    'nib' => $request->nib_number ?? '',
                    'npwp' => $request->npwp_number ?? '',
                    'website' => $request->website ?? '',
                    'phone_number' => $request->phone,
                    'bio' => $request->bio ?? '',
                    'desc' => $request->full_name . ' - ' . $request->position,
                    'address' => $request->address,
                ]);
                $this->uploadBuyerDocuments($request, $buyer->buyer_id);
            } else {
                $seller = Seller::create([
                    'user_id' => $user->user_id,
                    'company_name' => $request->company_name,
                    'country' => $request->country ?? 'Indonesia',
                    'nib' => $request->nib_number ?? '',
                    'npwp' => $request->npwp_number ?? '',
                    'website' => $request->website ?? '',
                    'phone_number' => $request->phone,
                    'bio' => $request->bio ?? '',
                    'desc' => $request->full_name . ' - ' . $request->position,
                    'address' => $request->address,
                ]);
                $this->uploadSellerDocuments($request, $seller->seller_id);
            }
            DB::commit();
            \Log::info('User created', ['user_id' => $user->user_id, 'photo_url' => $user->photo_url]);
            return redirect()
                ->route('register.success')
                ->with('success', 'Registrasi berhasil! Akun Anda akan ditinjau dan diaktifkan oleh admin/auditor.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()
                ->withErrors(['error' => 'Terjadi kesalahan saat registrasi: ' . $e->getMessage()])
                ->withInput($request->except('password', 'password_confirmation'));
        }
    }

    /**
     * Upload buyer documents.
     */
    protected function uploadBuyerDocuments(Request $request, $buyerId)
    {
        $documents = [
            'akta' => 'Akta Pendirian',
            'npwp' => 'NPWP Perusahaan',
            'nib' => 'NIB/SIUP',
            'iso' => 'ISO 14001',
        ];

        foreach ($documents as $key => $name) {
            if ($request->hasFile($key)) {
                $file = $request->file($key);
                $path = $file->store('documents/buyer/' . $buyerId, 'public');
                
                BuyerDocumentation::create([
                    'buyer_id' => $buyerId,
                    'document_name' => $name,
                    'document_type' => $file->getClientOriginalExtension(),
                    'size' => round($file->getSize() / 1024, 2),
                    'document_status' => 1,
                    'document_url' => $path,
                ]);
            }

            // Optional: Google Drive link for this document
            $driveField = $key . '_drive_url';
            if ($request->filled($driveField)) {
                BuyerDocumentation::create([
                    'buyer_id' => $buyerId,
                    'document_name' => $name . ' (Google Drive)',
                    'document_type' => 'gdrive',
                    'size' => 0,
                    'document_status' => 1,
                    'document_url' => $request->input($driveField),
                ]);
            }
        }
    }

    /**
     * Upload seller documents.
     */
    protected function uploadSellerDocuments(Request $request, $sellerId)
    {
        $documents = [
            'akta' => 'Akta Pendirian',
            'npwp' => 'NPWP Perusahaan',
            'nib' => 'NIB/SIUP',
            'iso' => 'ISO 14001',
            'gold_standard' => 'Gold Standard Certification',
            'vcs' => 'VCS Verification Report',
        ];

        foreach ($documents as $key => $name) {
            if ($request->hasFile($key)) {
                $file = $request->file($key);
                $path = $file->store('documents/seller/' . $sellerId, 'public');
                
                SellerDocumentation::create([
                    'seller_id' => $sellerId,
                    'document_name' => $name,
                    'document_type' => $file->getClientOriginalExtension(),
                    'size' => $file->getSize(),
                    'document_status' => 1,
                    'document_url' => $path,
                ]);
            }

            // Optional: Google Drive link for this document
            $driveField = $key . '_drive_url';
            if ($request->filled($driveField)) {
                SellerDocumentation::create([
                    'seller_id' => $sellerId,
                    'document_name' => $name . ' (Google Drive)',
                    'document_type' => 'gdrive',
                    'size' => 0,
                    'document_status' => 1,
                    'document_url' => $request->input($driveField),
                ]);
            }
        }
    }

    /**
     * Save base64 image to storage.
     */
    protected function saveBase64Image($base64String, $folder = 'images')
    {
        // Remove data:image/...;base64, prefix if exists
        if (strpos($base64String, ',') !== false) {
            $base64String = explode(',', $base64String)[1];
        }

        $imageData = base64_decode($base64String);
        
        if ($imageData === false) {
            return null;
        }

        // Generate unique filename
        $fileName = uniqid() . '_' . time() . '.png';
        $filePath = $folder . '/' . $fileName;

        // Save to storage/app/public
        Storage::disk('public')->put($filePath, $imageData);

        return $filePath;
    }

    /**
     * Handle logout request.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'Anda telah berhasil logout.');
    }

    /**
     * Redirect user based on their role.
     */
    protected function redirectBasedOnRole($role)
    {
        $r = strtolower($role ?? '');
        switch ($r) {
            case 'admin':
                return redirect()->route('admin.dashboard');
            case 'auditor':
                return redirect()->route('auditor.dashboard');
            case 'seller':
                return redirect()->route('seller.dashboard');
            case 'buyer':
                return redirect()->route('buyer.dashboard');
            default:
                return redirect()->route('home');
        }
    }
}
