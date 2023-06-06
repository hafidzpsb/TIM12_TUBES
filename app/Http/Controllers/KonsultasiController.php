<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konsultasi;
use Illuminate\Support\Facades\Validator;

class KonsultasiController extends Controller
{
    public function index()
    {
        if (Konsultasi::exists()){
            return response()->json([
                'message' => '200 | OK.',
                'response' => Konsultasi::with(['rm:id_rm,id_pasien,keluhan' => ['pasien:id_pasien,nama_pasien']])->get()
            ]);
        }
        else{
            return response()->json([
                'message' => '404 | Not found.'
            ]);
        }
    }
    public function show($id_konsul)
    {
        if (Konsultasi::find($id_konsul)){
            return response()->json([
                'message' => '200 | OK.',
                'response' => Konsultasi::find($id_konsul),
                'nama_pasien' => Konsultasi::find($id_konsul)->rm->keluhan,
                'dokter_pj' => Konsultasi::find($id_konsul)->rm->pasien->nama_pasien
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
            'dokter_pj' => 'required|string',
            'hasil_diagnosis' => 'required|string',
            'tindakan_medis' => 'required|string',
        ]);
        if ($validator->fails()){
            return response()->json([
                'message' => '204 | No Content.'
            ]);
        }
        else{
            return response()->json([
                'message' => '200 | OK.',
                'response' => Konsultasi::create($request->all())
            ]);
        }
    }
    public function update(Request $request, $id_konsul)
    {
        if (Konsultasi::find($id_konsul)){
            $validator = Validator::make($request->all(), [
                'dokter_pj' => 'required|string',
                'hasil_diagnosis' => 'required|string',
                'tindakan_medis' => 'required|string',
            ]);
            if ($validator->fails()){
                return response([
                    'message' => '204 | No Content.'
                ]);
            }
            else{
                $konsultasi = Konsultasi::find($id_konsul);
                $konsultasi -> update($request->all());
                return response()->json([
                    'message' => '200 | OK.',
                    'response' => $konsultasi
                ]);
            }
        }
        else{
            return response()->json([
                'message' => '404 | Not found.'
            ]);
        }
    }
    public function delete(Request $request, $id_konsul)
    {
        if (Konsultasi::find($id_konsul)){
            $konsultasi = Konsultasi::find($id_konsul);
            $konsultasi -> delete();
            return response()->json([
                'message' => '200 | OK.'
            ]);
        }
        else{
            return response()->json([
                'message' => '404 | Not found.'
            ]);
        }
    }
}
