# Revisi Sistem Registrasi - Setup Guide

## 1. Jalankan Migration

Jalankan migration untuk menambahkan kolom profile_photo:

```bash
php artisan migrate
```

## 2. Buat Storage Link

Untuk mengakses file yang diupload, buat symbolic link:

```bash
php artisan storage:link
```

Perintah ini akan membuat symbolic link dari `public/storage` ke `storage/app/public`.

## 3. Struktur Database yang Diperbarui

### Tabel `buyers`:
- `buyer_id` (PK)
- `user_id` (FK)
- `profile_photo` (nullable) ✅ BARU
- `company_name`
- `country`
- `nib`
- `npwp`
- `website`
- `phone_number`
- `bio`
- `desc`
- `address`
- `verified_at`

### Tabel `sellers`:
- `seller_id` (PK)
- `user_id` (FK)
- `profile_photo` (nullable) ✅ BARU
- `company_name`
- `country`
- `nib`
- `npwp`
- `website`
- `phone_number`
- `bio`
- `desc`
- `address`
- `verified_at`

### Tabel `buyer_documentations`:
- `document_id` (PK)
- `buyer_id` (FK)
- `document_name`
- `document_type`
- `size`
- `document_status`
- `document_url`

### Tabel `seller_documentations`:
- `document_id` (PK)
- `seller_id` (FK)
- `document_name`
- `document_type`
- `size`
- `document_status`
- `document_url`

## 4. Field Form Registrasi

### Step 1: Tipe Akun
- `account_type` (buyer/seller)

### Step 2: Data Perusahaan
- `company_name` *
- `company_email` *
- `phone` *
- `industry` *
- `address` *
- `full_name` *
- `position` *
- `nib_number`
- `npwp_number`
- `website`
- `country`
- `bio`
- `password` *
- `password_confirmation` *

### Step 3: Foto Profil (Opsional)
- `profile_photo` (base64 cropped image)

### Step 4: Dokumen
**Wajib (Semua Pengguna):**
- `akta` * (Akta Pendirian)
- `npwp` * (NPWP Perusahaan)
- `nib` * (NIB/SIUP)
- `iso` (ISO 14001 - Optional)

**Seller Only:**
- `gold_standard` (Gold Standard Certification)
- `vcs` (VCS Verification Report)

### Step 5: Verifikasi
- `terms` (checkbox)

## 5. Upload & Storage

### Foto Profil:
- Disimpan di: `storage/app/public/profile_photos/`
- Format: Base64 → PNG
- Akses via: `{{ asset('storage/profile_photos/filename.png') }}`

### Dokumen:
- Disimpan di: `storage/app/public/documents/buyer/{buyer_id}/` atau `storage/app/public/documents/seller/{seller_id}/`
- Format: PDF, JPG, JPEG, PNG
- Max size: 10MB
- Akses via: `{{ asset('storage/documents/...') }}`

## 6. Fitur yang Sudah Diimplementasi

✅ Upload foto profil dengan crop (optional)
✅ Upload multiple dokumen (PDF/Image)
✅ Simpan foto ke database (path)
✅ Simpan dokumen ke database
✅ Validasi file type dan size
✅ Transaction untuk data integrity
✅ Error handling dan display
✅ Base64 image processing
✅ File storage management

## 7. Testing

1. Buka halaman register: http://localhost:8000/register
2. Pilih tipe akun (Buyer/Seller)
3. Isi data perusahaan lengkap
4. Upload foto profil (optional)
5. Upload semua dokumen wajib
6. Submit form
7. Check database dan storage folder

## 8. Troubleshooting

**Error "Storage link not found":**
```bash
php artisan storage:link
```

**Error "Permission denied":**
```bash
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```

**File tidak tersimpan:**
- Pastikan folder `storage/app/public` ada
- Check permission folder storage
- Pastikan `.env` FILESYSTEM_DISK=public sudah benar
