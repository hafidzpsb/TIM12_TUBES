<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RM;

class RMController extends Controller
{
    public function index()
    {
        $rm_index = RM::all();
        return $rm_index;
    }
    public function store(Request $request)
    {
        $rm_store = RM::create($request->all());
        return $rm_store;
    }
    public function show($id_rm)
    {
        $rm_show = RM::find($id_rm);
        return $rm_show;
    }
    public function update(Request $request, $id_rm)
    {
        $rm_update = RM::find($id_rm);
        $rm_update -> update($request->all());
        return $rm_update;
    }
    public function delete(Request $request, $id_rm)
    {
        $rm_delete = RM::find($id_rm);
        $rm_delete -> delete();
        return 200;
    }
}
