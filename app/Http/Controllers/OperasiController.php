<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Operasi;
use Illuminate\Support\Facades\Validator;

class OperasiController extends Controller
{
    public function index()
    {
        if (Operasi::exists()){
            return response()->json([
                'message' => '200 | OK.',
                'response' => Operasi::with('pasien:id_pasien,nama_pasien', 'konsultasi:id_konsul,id_pasien,dokter_pj')->get()
            ]);
        }
        else{
            return response()->json([
                'message' => '404 | Not found.'
            ]);
        }
    }
    public function show($id_operasi)
    {
        if (Operasi::find($id_operasi)){
            return response()->json([
                'message' => '200 | OK.',
                'response' => Operasi::find($id_operasi),
                'nama_pasien' => Operasi::find($id_operasi)->pasien->nama_pasien,
                'dokter_pj' => Operasi::find($id_operasi)->konsultasi->dokter_pj
            ]);
        }
        else{
            return response()->json([
                'message' => '404 | Not found.'
            ]);
        }
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_pasien' => 'required|integer',
            'id_konsul' => 'required|integer',
            'no_surat_operasi' => 'required|integer',
            'status_operasi' => 'required|string',
        ]);
        if ($validator->fails()){
            return response()->json([
                'message' => '400 | Bad Request.'
            ]);
        }
        else{
            return response()->json([
                'message' => '200 | OK.',
                'content' => Operasi::create($request->all())
            ]);
        }
    }
    public function update(Request $request, $id_operasi)
    {
        if (Operasi::find($id_operasi)){
            $validator = Validator::make($request->all(), [
                'no_surat_operasi' => 'required|integer',
                'status_operasi' => 'required|string',
            ]);
            if ($validator->fails()){
                return response()->json([
                    'message' => '400 | Bad Request.'
                ]);
            }
            else{
                $operasi = Operasi::find($id_operasi);
                $operasi -> update($request->all());
                return response()->json([
                    'message' => '200 | OK.',
                    'content' => $operasi
                ]);
            }
        }
        else{
            echo '404 | Not found.';
        }
    }
    public function delete(Request $request, $id_operasi)
    {
        if (Operasi::find($id_operasi)){
            $operasi = Operasi::find($id_operasi);
            $operasi -> delete();
            return response()->json([
                'message' => '200 | OK.',
            ]);
        }
        else{
            return response()->json([
                'message' => '404 | Not found.',
            ]);
        }
    }
}
