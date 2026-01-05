<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Buyer;
use App\Models\Seller;
use App\Models\BuyerDocumentation;
use App\Models\SellerDocumentation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        return view('main_page.login.login');
    }

    /**
     * Handle login request.
     */
    public function login(Request $request)
    {
        // Validate input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput($request->only('email'));
        }

        // Find user by email
        $user = User::where('email', $request->email)->first();

        // Check if user exists and password is correct
        if (!$user || !Hash::check($request->password, $user->password_hash)) {
            return back()
                ->withErrors(['email' => 'Email atau password salah.'])
                ->withInput($request->only('email'));
        }

        // Check user status
        if ($user->status !== 'active') {
            return back()
                ->withErrors(['email' => 'Akun Anda tidak aktif. Silakan hubungi administrator.'])
                ->withInput($request->only('email'));
        }

        // Update last login
        $user->last_login = now();
        $user->save();

        // Login the user
        Auth::login($user, $request->filled('remember'));

        // Redirect based on role
        return $this->redirectBasedOnRole($user->role);
    }

    /**
     * Show the registration form.
     */
    public function showRegisterForm()
    {
        return view('main_page.register.register');
    }

    /**
     * Show registration success (pending approval) page.
     */
    public function showRegisterSuccess()
    {
        return view('main_page.register.register-success');
    }

    /**
     * Handle registration request.
     */
    public function register(Request $request)
    {
        // Validate input
        $validator = Validator::make($request->all(), [
            'account_type' => 'required|in:buyer,seller',
            'company_name' => 'required|string|max:255',
            'company_email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:20',
            'industry' => 'required|string',
            'address' => 'required|string',
            'full_name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
            'nib_number' => 'nullable|string|max:255',
            'npwp_number' => 'nullable|string|max:255',
            // Website tidak lagi dipaksa format URL penuh (http/https), cukup teks biasa
            'website' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'country' => 'nullable|string|max:255',
            // File uploads - documents
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

            // Create user account
            $user = User::create([
                'email' => $request->company_email,
                'password_hash' => Hash::make($request->password),
                'role' => $request->account_type,
                // Akun baru berstatus pending, menunggu persetujuan admin/auditor
                'status' => 'pending',
                'created_at' => now(),
                'last_login' => null,
            ]);

            // Handle profile photo upload
            $profilePhotoPath = null;
            if ($request->filled('profile_photo')) {
                $profilePhotoPath = $this->saveBase64Image($request->profile_photo, 'profile_photos');
            }

            // Create profile based on account type
            if ($request->account_type === 'buyer') {
                $buyer = Buyer::create([
                    'user_id' => $user->user_id,
                    'profile_photo' => $profilePhotoPath,
                    'company_name' => $request->company_name,
                    'country' => $request->country ?? 'Indonesia',
                    'nib' => $request->nib_number ?? '',
                    'npwp' => $request->npwp_number ?? '',
                    'website' => $request->website ?? '',
                    'phone_number' => $request->phone,
                    'bio' => $request->bio ?? '',
                    'desc' => $request->full_name . ' - ' . $request->position,
                    'address' => $request->address,
                    'verified_at' => null,
                ]);

                // Upload buyer documents
                $this->uploadBuyerDocuments($request, $buyer->buyer_id);
            } else {
                $seller = Seller::create([
                    'user_id' => $user->user_id,
                    'profile_photo' => $profilePhotoPath,
                    'company_name' => $request->company_name,
                    'country' => $request->country ?? 'Indonesia',
                    'nib' => $request->nib_number ?? '',
                    'npwp' => $request->npwp_number ?? '',
                    'website' => $request->website ?? '',
                    'phone_number' => $request->phone,
                    'bio' => $request->bio ?? '',
                    'desc' => $request->full_name . ' - ' . $request->position,
                    'address' => $request->address,
                    'verified_at' => null,
                ]);

                // Upload seller documents
                $this->uploadSellerDocuments($request, $seller->seller_id);
            }

            DB::commit();

            // Redirect ke halaman sukses registrasi (tanpa auto-login)
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
                    'size' => $file->getSize(),
                    'document_status' => 'pending',
                    'document_url' => $path,
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
                    'document_status' => 'pending',
                    'document_url' => $path,
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
        switch ($role) {
            case 'admin':
                return redirect()->route('admin.dashboard');
            case 'seller':
                return redirect()->route('seller.dashboard');
            case 'buyer':
                // Untuk saat ini buyer diarahkan ke landing page dengan navbar versi login
                return redirect()->route('home');
            default:
                return redirect()->route('home');
        }
    }
}
