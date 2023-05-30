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
            echo '200 | OK.';
            return Konsultasi::all();
        }
        else {
            echo '404 | Not found.'; 
        }
    }
    public function show($id_konsul)
    {
        if (Konsultasi::find($id_konsul)){
            echo '200 | OK.';
            return Konsultasi::find($id_konsul);
        }
        else {
            echo '404 | Not found.';
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
        if ($validator->fails()) {
            echo '204 | No Content.';
        }
        else {
            echo "200 | OK.";
            return Konsultasi::create($request->all());
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
            if ($validator->fails()) {
                echo '204 | No Content.';
            }
            else {
                echo "200 | OK.";
                $konsultasi = Konsultasi::find($id_konsul);
                $konsultasi -> update($request->all());
                return $konsultasi;
            }
        }
        else {
            echo '404 | Not found.';
        }
    }
    public function delete(Request $request, $id_konsul)
    {
        if (Konsultasi::find($id_konsul)){
            echo "200 | OK.";
            $konsultasi = Konsultasi::find($id_konsul);
            $konsultasi -> delete();
        }
        else {
            echo '404 | Not found.';
        }
    }
}
