<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resep;

class ResepController extends Controller
{
    public function index()
    {
        if (Resep::all()->isNotEmpty())
        {
            return Resep::all();
        } 
        else 
        {
            return 404;
        }
    }
    public function show($id_resep)
    {
        if (Resep::find($id_resep)) {
            return Resep::find($id_resep);
        } 
        else
        {
            return 404;
        }
    }
    public function store(Request $request)
    {
        return Resep::create($request->all());
    }
    public function update(Request $request, $id_resep)
    {
        $resep = Resep::find($id_resep);
        if ($resep)
        {
            $resep->update($request->all());
            return $resep;
        } 
        else
        {
            return 404;
        }
    }
    public function delete(Request $request, $id_resep)
    {
        $resep = Resep::find($id_resep);
        if ($resep)
        {
            $resep->delete();
            return 200;
        } 
        else
        {
            return 404;
        }
    }
}
