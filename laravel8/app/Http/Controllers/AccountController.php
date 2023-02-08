<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

function decryptField($field)
{
    return Crypt::decrypt($field);
}

use App\Models\Account;

class AccountController extends Controller
{
    // mengambil semua data
    public function all()
    {
        return Account::all();
    }

    // mengambil data by id
    public function show($id)
    {
        return Account::find($id);
    }

    // menambah data
    public function store(Request $request)
    {
        try {
            $plaintext = $request->only('password');
            $encrypted = Crypt::encrypt($plaintext);

            $request->merge(['password' => $encrypted,]);

            return Account::create($request->all());
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Email / Username Already Created'], 404);
        }
    }

    // menambah data
    public function login(Request $request)
    {
        $account = Account::where('email', $request->input('email'))->first();
        $testing = Crypt::decrypt($account->password);
        $plaintext = str_replace(array('{', '}'), '', $testing);
        if ($plaintext['password'] == $request->input('password')) {
            return $account;
        } else {
            return response()->json(['error' => 'Model not found'], 404);
        }
    }

    // mengubah data
    public function update($id, Request $request)
    {
        // $account = Account::find($id);
        // $account->update($request->all());
        // return $account;

        try {
            $account = Account::find($id);

            $plaintext = $request->only('password');
            $encrypted = Crypt::encrypt($plaintext);

            $request->merge(['password' => $encrypted,]);

            $account->update($request->all());
            return $account;
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Email / Username Already Created'], 404);
        }
    }

    // menghapus data
    public function delete($id)
    {
        $account = Account::find($id);
        $account->delete();
        return 204;
    }

    public function updaterole($id, Request $request)
    {
        $account = Account::find($id);
        $account->update([
            'role' => $request->input('role'),
        ]);
        return 204;
    }
}