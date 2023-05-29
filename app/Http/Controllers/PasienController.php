<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;

class PasienController extends Controller
{
    public function index()
    {
        return Pasien::all();
    }
    public function show($id_pasien)
    {
        return Pasien::find($id_pasien);
    }
    public function store(Request $request)
    {
        return Pasien::create($request->all());
    }
    public function update(Request $request, $id_pasien)
    {
        $pasien = Pasien::findOrFail($id_pasien);
        $pasien->update($request->all());
        return $pasien;
    }
    public function delete(Request $request, $id_pasien)
    {
        $pasien = Pasien::findOrFail($id_pasien);
        $pasien->delete();
        return 200;
    }
}
