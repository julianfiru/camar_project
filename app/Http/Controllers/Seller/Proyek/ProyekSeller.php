<?php

namespace App\Http\Controllers\Seller\Proyek;

use App\Http\Controllers\Seller\Controller;
use App\Models\Seller\Order;
use App\Models\Seller\Project;
use Illuminate\Support\Facades\DB;
use App\Models\Seller\Mrv;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProyekSeller extends Controller
{
    public function index()
    {
        return view('Seller.Content.Proyek.proyek', [
            'totalProyek'      => $this->totalProyek,
            'totalAktif'      => $this->totalAktif,
            'totalPending'        => $this->totalPending,
            'totalBatal'  => $this->totalBatal,
            'projects'  => $this->proyek,
        ]);
    }
    public function getDetail($id)
    {
        $project = Project::with(['seller', 'mrv'])->find($id);
        $revenue = Order::join('projects', 'offset_orders.project_id', '=', 'projects.project_id')
                    ->where('offset_orders.project_id', $id)
                    ->where('offset_orders.order_status', 2)
                    ->sum(DB::raw('offset_orders.offset_amount_ton * projects.price'));
        $project->revenue = $revenue;
        return response()->json($project);
    }
    public function UploadDocument(Request $request)
    {
        $request->validate([
            'project_id'    => 'required|exists:projects,project_id',
            'document_file' => 'required|file|mimes:pdf,doc,docx|max:10240',
        ]);
        try {
            if ($request->hasFile('document_file')) {
                $file = $request->file('document_file');
                $originalName = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $size = $file->getSize();
                $folderPath = 'Project/' . Auth::user()->seller->company_name . '/' . $request->project_id;
                $fileName = time() . '_' . Str::slug(pathinfo($originalName, PATHINFO_FILENAME)) . '.' . $extension;
                $path = $file->storeAs(
                    $folderPath,
                    $fileName,
                    'public'
                );
                $mrv = Mrv::create([
                    'project_id'   => $request->project_id,
                    'mrv_name'     => $originalName,
                    'document_url' => $path,
                    'size'         => $size,
                    'status'       => 1,
                    'submitted_at' => now(),
                ]);
                return response()->json([
                    'status'  => 'success',
                    'message' => 'Laporan berhasil diupload!',
                    'data'    => $mrv
                ], 200);
            }
            return response()->json(['status' => 'error', 'message' => 'File tidak ditemukan'], 400);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
}
