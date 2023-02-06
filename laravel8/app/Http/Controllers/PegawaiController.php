<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    // mengambil semua data
    public function all()
    {
        return Pegawai::all();
    }

    // mengambil data by id
    public function show($id)
    {
        return Pegawai::find($id);
    }

    // menambah data
    public function store(Request $request)
    {
        return Pegawai::create($request->all());
    }

    // mengubah data
    public function update($id, Request $request)
    {
        $pegawai = Pegawai::find($id);
        $pegawai->update($request->all());
        return $pegawai;
    }

    // menghapus data
    public function delete($id)
    {
        $pegawai = Pegawai::find($id);
        $pegawai->delete();
        return 204;
    }

    public function nama($id)
    {
        $pegawai = Pegawai::where('username', $id)->first();
        return $pegawai;
    }
}
