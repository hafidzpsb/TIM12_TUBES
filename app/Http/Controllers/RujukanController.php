<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rujukan;

class RujukanController extends Controller
{
    public function index()
    {
        $rujukan_index = Rujukan::all();
        if ($rujukan_index -> isEmpty()){
            abort(404);
        }else{
            return $rujukan_index;
        }
    }
    public function store(Request $request)
    {
        $rujukan_store = Rujukan::create($request->all());
        return $rujukan_store;
    }
    public function show($id_rujuk)
    {
        $rujukan_show = Rujukan::find($id_rujuk);
        if ($rujukan_show){
            return $rujukan_show;
        }else{
            abort(404);
        }
    }
    public function update(Request $request, $id_rujuk)
    {
        $rujukan_update = Rujukan::find($id_rujuk);
        if ($rujukan_update){
            $rujukan_update -> update($request->all());
            return $rujukan_update;
        }else{
            abort(404);
        }
    }
    public function delete(Request $request, $id_rujuk)
    {
        $rujukan_delete = Rujukan::find($id_rujuk);
        if ($rujukan_delete){
            $rujukan_delete -> delete();
            return 200;
        }else{
            abort(404);
        }
    }
}
