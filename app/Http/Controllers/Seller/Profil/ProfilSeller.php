<?php

namespace App\Http\Controllers\Seller\Profil;

use App\Http\Controllers\Seller\Controller;
use App\Models\Seller\SellerDocumentation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProfilSeller extends Controller
{
    public function index()
    {
        return view('Seller.Content.Profil.profil', [
            'profil'      => $this->profil,
            'email'      => $this->user,
            'bank'        => $this->bank,
            'document'  => $this->document,
            'totalAktif'  => $this->totalAktif,
            'statusSeller'  => $this->statusSeller,
            'statusStyle'  => $this->statusStyleSeller,
            'riwayatTransaksi'  => $this->riwayatTransaksi,
        ]);
    }
    public function UploadDocument(Request $request)
    {
        $request->validate([
            'document_file' => 'required|file|mimes:pdf,doc,docx|max:10240',
        ]);
        try {
            if ($request->hasFile('document_file')) {
                $file = $request->file('document_file');
                $originalName = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $size = $file->getSize();
                $folderPath = 'Profil/' . Auth::user()->seller->company_name;
                $fileName = time() . '_' . Str::slug(pathinfo($originalName, PATHINFO_FILENAME)) . '.' . $extension;
                $path = $file->storeAs(
                    $folderPath,
                    $fileName,
                    'public'
                );
                $document = SellerDocumentation::create([
                    'seller_id'   => Auth::user()->seller->seller_id,
                    'document_name'     => $originalName,
                    'document_type'     => $originalName,
                    'size'         => $size,
                    'document_status'       => 1,
                    'document_url' => $path,
                    'submitted_at' => now(),
                ]);
                return response()->json([
                    'status'  => 'success',
                    'message' => 'Laporan berhasil diupload!',
                    'data'    => $document
                ], 200);
            }
            return response()->json(['status' => 'error', 'message' => 'File tidak ditemukan'], 400);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
}
