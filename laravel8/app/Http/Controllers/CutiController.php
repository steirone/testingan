<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use Illuminate\Http\Request;

class CutiController extends Controller
{
    public function all()
    {
        return Cuti::all();
    }

    // mengambil data by id
    public function show($id)
    {
        return Cuti::find($id);
    }

    // menambah data
    public function store(Request $request)
    {
        return Cuti::create($request->all());
    }

    // mengubah data
    public function update($id, Request $request)
    {
        $cuti = Cuti::find($id);
        $cuti->update($request->all());
        return $cuti;
    }

    // menghapus data
    public function delete($id)
    {
        $cuti = Cuti::find($id);
        $cuti->delete();
        return 204;
    }

    public function username($id)
    {
        return Cuti::where('username', $id)->get();
    }
}
