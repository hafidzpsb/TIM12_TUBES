<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;

class PasienController extends Controller
{
    public function index()
    {
        if  (Pasien::all()->isNotEmpty())
        {
            return Pasien::all();
        }
        else
        {
            return 404;
        }
    }
    public function show($id_pasien)
    {
        if (Pasien::find($id_pasien))
        {
            return Pasien::find($id_pasien);
        }
        else
        {
            return 404;
        }
    }
    public function store(Request $request)
    {
        return Pasien::create($request->all());
    }
    public function update(Request $request, $id_pasien)
    {
        $pasien = Pasien::findOrFail($id_pasien);
        if ($pasien)
        {
            $pasien->update($request->all());
            return $pasien;
        } 
        else
        {
            return 404;
        }
    }
    public function delete(Request $request, $id_pasien)
    {
        $pasien = Pasien::findOrFail($id_pasien);
        if ($pasien)
        {
            $pasien->delete();
            return 200;
        } 
        else
        {
            return 404;
        }
    }
}
