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

        // Jika status belum 3 (aktif), jangan login-kan user,
        // hanya arahkan ke halaman status akun khusus dengan informasi di session
        if ($user->status !== 3) {
            $request->session()->put('account_status_email', $user->email);
            $request->session()->put('account_status_code', $user->status);

            return redirect()->route('account.status');
        }

        // Update last login untuk akun aktif
        $user->last_login = now();
        $user->save();

        // Login the user
        Auth::login($user, $request->filled('remember'));

        // Redirect based on role
        return $this->redirectBasedOnRole($user->role);
    }

    /**
     * Tampilkan status akun untuk user yang belum aktif.
     */
    public function showAccountStatus(Request $request)
    {
        $email = $request->session()->get('account_status_email');
        $statusCode = $request->session()->get('account_status_code');

        if (!$email || $statusCode === null) {
            return redirect()->route('login');
        }

        // Map status kode ke label & pesan
        switch ($statusCode) {
            case 1:
                $statusLabel = 'Menunggu Verifikasi';
                $statusDescription = 'Pendaftaran akun Anda telah kami terima dan saat ini sedang ditinjau oleh tim CAMAR. Anda akan mendapatkan pemberitahuan melalui email setelah proses verifikasi selesai.';
                $statusBadge = 'pending';
                break;
            case 2:
                $statusLabel = 'Terverifikasi, Menunggu Aktivasi';
                $statusDescription = 'Data perusahaan dan dokumen Anda telah terverifikasi. Akun Anda akan segera diaktifkan oleh tim CAMAR sehingga bisa digunakan untuk mengakses fitur platform.';
                $statusBadge = 'info';
                break;
            case 0:
                $statusLabel = 'Registrasi Ditolak / Dibatalkan';
                $statusDescription = 'Mohon maaf, registrasi akun Anda ditolak atau dibatalkan. Jika Anda memerlukan penjelasan lebih lanjut atau ingin mengajukan pendaftaran ulang, silakan hubungi tim CAMAR melalui kanal dukungan resmi.';
                $statusBadge = 'rejected';
                break;
            default:
                $statusLabel = 'Status Akun Tidak Aktif';
                $statusDescription = 'Status akun Anda saat ini belum aktif. Silakan hubungi tim CAMAR jika membutuhkan bantuan atau klarifikasi lebih lanjut.';
                $statusBadge = 'info';
                break;
        }

        return view('main_page.auth.account-status', [
            'email' => $email,
            'statusCode' => $statusCode,
            'statusLabel' => $statusLabel,
            'statusDescription' => $statusDescription,
            'statusBadge' => $statusBadge,
        ]);
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
        // Validate input dengan pesan yang lebih mudah dipahami pengguna
        $validator = Validator::make(
            $request->all(),
            [
                'account_type' => 'required|in:buyer,seller',
                'company_name' => 'required|string|max:255',
                'company_email' => 'required|email',
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
                'akta_gdrive' => 'nullable|url|max:2048',
                'npwp' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10240',
                'npwp_gdrive' => 'nullable|url|max:2048',
                'nib' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10240',
                'nib_gdrive' => 'nullable|url|max:2048',
                'iso' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10240',
                'iso_gdrive' => 'nullable|url|max:2048',
                'gold_standard' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10240',
                'gold_standard_gdrive' => 'nullable|url|max:2048',
                'vcs' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10240',
                'vcs_gdrive' => 'nullable|url|max:2048',
            ],
            [
                'account_type.required' => 'Silakan pilih tipe akun (Buyer atau Seller).',
                'account_type.in' => 'Tipe akun yang dipilih tidak dikenali.',

                'company_name.required' => 'Nama perusahaan wajib diisi.',
                'company_name.max' => 'Nama perusahaan terlalu panjang (maksimal 255 karakter).',

                'company_email.required' => 'Email perusahaan wajib diisi.',
                'company_email.email' => 'Format email perusahaan tidak valid.',
                'company_email.unique' => 'Email perusahaan ini sudah terdaftar di sistem kami.',

                'phone.required' => 'Nomor telepon perusahaan wajib diisi.',
                'phone.max' => 'Nomor telepon terlalu panjang.',

                'industry.required' => 'Silakan pilih industri perusahaan.',

                'address.required' => 'Alamat perusahaan wajib diisi.',

                'full_name.required' => 'Nama lengkap penanggung jawab wajib diisi.',
                'full_name.max' => 'Nama lengkap terlalu panjang (maksimal 255 karakter).',

                'position.required' => 'Jabatan penanggung jawab wajib diisi.',
                'position.max' => 'Jabatan terlalu panjang (maksimal 255 karakter).',

                'password.required' => 'Password wajib diisi.',
                'password.min' => 'Password minimal terdiri dari 8 karakter.',
                'password.confirmed' => 'Konfirmasi password tidak sama dengan password utama.',

                'nib_number.max' => 'Nomor NIB terlalu panjang (maksimal 255 karakter).',
                'npwp_number.max' => 'Nomor NPWP terlalu panjang (maksimal 255 karakter).',

                'website.max' => 'Alamat website terlalu panjang (maksimal 255 karakter).',

                'country.max' => 'Nama negara terlalu panjang (maksimal 255 karakter).',

                'akta.mimes' => 'Akta pendirian harus berupa file PDF atau gambar (JPG, JPEG, PNG).',
                'akta.max' => 'Ukuran file Akta pendirian maksimal 10 MB.',

                'npwp.mimes' => 'Dokumen NPWP harus berupa file PDF atau gambar (JPG, JPEG, PNG).',
                'npwp.max' => 'Ukuran file NPWP maksimal 10 MB.',

                'nib.mimes' => 'Dokumen NIB/SIUP harus berupa file PDF atau gambar (JPG, JPEG, PNG).',
                'nib.max' => 'Ukuran file NIB/SIUP maksimal 10 MB.',

                'iso.mimes' => 'Dokumen ISO harus berupa file PDF atau gambar (JPG, JPEG, PNG).',
                'iso.max' => 'Ukuran file ISO maksimal 10 MB.',

                'gold_standard.mimes' => 'Dokumen Gold Standard harus berupa file PDF atau gambar (JPG, JPEG, PNG).',
                'gold_standard.max' => 'Ukuran file Gold Standard maksimal 10 MB.',

                'vcs.mimes' => 'Dokumen VCS harus berupa file PDF atau gambar (JPG, JPEG, PNG).',
                'vcs.max' => 'Ukuran file VCS maksimal 10 MB.',
                'akta_gdrive.url' => 'Link Google Drive Akta harus berupa URL yang valid.',
                'npwp_gdrive.url' => 'Link Google Drive NPWP harus berupa URL yang valid.',
                'nib_gdrive.url' => 'Link Google Drive NIB/SIUP harus berupa URL yang valid.',
                'iso_gdrive.url' => 'Link Google Drive ISO harus berupa URL yang valid.',
                'gold_standard_gdrive.url' => 'Link Google Drive Gold Standard harus berupa URL yang valid.',
                'vcs_gdrive.url' => 'Link Google Drive VCS harus berupa URL yang valid.',
            ]
        );

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput($request->except('password', 'password_confirmation'));
        }

        try {
            DB::beginTransaction();
            // Cek apakah email sudah pernah terdaftar sebelumnya
            $existingUser = User::where('email', $request->company_email)->first();

            // Jika email sudah dipakai oleh akun yang bukan status 0 (ditolak/dibatalkan), blok registrasi
            if ($existingUser && $existingUser->status !== 0) {
                DB::rollBack();

                return back()
                    ->withErrors(['company_email' => 'Email perusahaan ini sudah terdaftar di sistem kami. Silakan gunakan email lain atau masuk ke akun yang sudah ada.'])
                    ->withInput($request->except('password', 'password_confirmation'));
            }

            // Jika email pernah dipakai tapi status 0 (registrasi ditolak), izinkan registrasi ulang dengan akun yang sama
            if ($existingUser && $existingUser->status === 0) {
                $user = $existingUser;
                $user->password_hash = Hash::make($request->password);
                $user->role = $request->account_type;
                $user->status = 1; // kembali ke status menunggu verifikasi
                $user->created_at = now();
                $user->last_login = null;
                $user->save();

                // Bersihkan profil & dokumen lama sebelum membuat yang baru
                $buyerProfiles = Buyer::where('user_id', $user->user_id)->get();
                foreach ($buyerProfiles as $buyerProfile) {
                    BuyerDocumentation::where('buyer_id', $buyerProfile->buyer_id)->delete();
                }
                Buyer::where('user_id', $user->user_id)->delete();

                $sellerProfiles = Seller::where('user_id', $user->user_id)->get();
                foreach ($sellerProfiles as $sellerProfile) {
                    SellerDocumentation::where('seller_id', $sellerProfile->seller_id)->delete();
                }
                Seller::where('user_id', $user->user_id)->delete();
            } else {
                // Buat user baru pertama kali
                $user = User::create([
                    'email' => $request->company_email,
                    'password_hash' => Hash::make($request->password),
                    'role' => $request->account_type,
                    // Akun baru: 1 = menunggu verifikasi admin
                    'status' => 1,
                    'created_at' => now(),
                ]);
            }

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
                ->withErrors([
                    'error' => 'Terjadi kendala saat memproses registrasi Anda. Silakan coba lagi beberapa saat lagi atau hubungi tim CAMAR jika masalah berlanjut.',
                ])
                // Simpan detail error teknis di session terpisah untuk keperluan debugging di UI (double click warning box)
                ->with('debug_error', $e->getMessage())
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
            } elseif ($request->filled($key . '_gdrive')) {
                BuyerDocumentation::create([
                    'buyer_id' => $buyerId,
                    'document_name' => $name,
                    'document_type' => 'gdrive-url',
                    'size' => 0,
                    'document_status' => 'pending',
                    'document_url' => $request->input($key . '_gdrive'),
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
            } elseif ($request->filled($key . '_gdrive')) {
                SellerDocumentation::create([
                    'seller_id' => $sellerId,
                    'document_name' => $name,
                    'document_type' => 'gdrive-url',
                    'size' => 0,
                    'document_status' => 'pending',
                    'document_url' => $request->input($key . '_gdrive'),
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
