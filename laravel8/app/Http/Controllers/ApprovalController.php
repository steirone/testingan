<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    public function all()
    {
        return Approval::all();
    }

    // mengambil data by id
    public function show($id)
    {
        return Approval::find($id);
    }

    // menambah data
    public function store(Request $request)
    {
        return Approval::create($request->all());
    }

    // mengubah data
    public function update($id, Request $request)
    {
        $approval = Approval::find($id);
        $approval->update($request->all());
        return $approval;
    }

    // menghapus data
    public function delete($id)
    {
        $approval = Approval::find($id);
        $approval->delete();
        return 204;
    }

    public function username($id)
    {
        return Approval::where('username', $id)->get();
    }
}
