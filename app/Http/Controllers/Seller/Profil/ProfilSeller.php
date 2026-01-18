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
            'document'  => $this->documentProfil,
            'totalAktif'  => $this->totalAktif,
            'statusSeller'  => $this->statusSeller,
            'statusStyle'  => $this->statusStyleSeller,
            'riwayatTransaksi'  => $this->riwayatTransaksi,
        ]);
    }
    public function uploadDocument(Request $request)
    {
        $request->validate([
            'document_category' => 'required|string',
            'document_file'     => 'required|file|mimes:pdf,doc,docx|max:10240',
        ]);
        try {
            $user = Auth::user();
            $subclass = $request->document_category;
            $allCategories = getDocumentCategories(); 
            $parentClass = 'others';
            foreach ($allCategories as $groupKey => $group) {
                if (array_key_exists($subclass, $group['items'])) {
                    $parentClass = $groupKey;
                    break;
                }
            }
            if ($request->hasFile('document_file')) {
                $file = $request->file('document_file');
                $dbName = $subclass . '_' . time();
                $filename = $subclass . '_' . time() . '.' . $file->getClientOriginalExtension();
                $folderPath = 'Document/' . $user->role . '/' . $user->seller->seller_id . '/' . $parentClass;
                $path = $file->storeAs(
                    $folderPath,
                    $filename,
                    'public'
                );
                SellerDocumentation::create([
                    'seller_id'       => $user->seller->seller_id,
                    'document_name'   => $dbName,
                    'document_type'   => $file->getClientOriginalExtension(),
                    'size'            => $file->getSize(),
                    'document_status' => 1,
                    'document_url'    => $path, 
                    'submitted_at'    => now(),
                ]);

                return back()->with('success', 'Dokumen berhasil diunggah.');
            }

            return back()->with('error', 'File tidak ditemukan.');

        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan sistem.');
        }
    }
}
