<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $Accounts = User::paginate(10);
        return view('pages.user.index', compact('Accounts'));
    }

    public function create()
    {
        return view('pages.user.create');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view("pages.user.edit", compact("user"));
    }

    public function store(Request $request)
    {
        $request->validate([
            "npwp" => "required|min:12|max:12",
            "password" => "required",
            "name" => "required",
            "address" => "required",
            "user_type" => "required|string|in:admin,user"
        ]);

        $npwp_exists = User::where('npwp', $request->npwp)->exists();

        if ($npwp_exists) {
            return back()->with("err", "NPWP sudah ada, coba dengan nomor yang berbeda.")->withInput();
        }

        $npwp_with_unique = $request->npwp . str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);

        $user = User::create([
            "npwp" => $npwp_with_unique,
            "password" => bcrypt($request->password),
            "name" => $request->name,
            "address" => $request->address,
            "user_type" => $request->user_type,
        ]);

        return redirect("/user")->with("success", "Sukses menambahkan akun");
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            "npwp" => "required",
            "password" => "nullable",
            "name" => "required",
            "address" => "required",
            "user_type" => "required|string|in:admin,user"
        ]);
    
        $user = User::findOrFail($id);
    
        // Periksa apakah NPWP baru sudah ada di database, kecuali untuk pengguna yang sedang diupdate
        if (User::where('npwp', $request->npwp)->where('id', '<>', $id)->exists()) {
            return back()->with('err', 'NPWP sudah ada, coba dengan nomor yang berbeda.');
        }
    
        // Update pengguna
        $user->update([
            "npwp" => $request->npwp,
            "name" => $request->name,
            "address" => $request->address,
            "user_type" => $request->user_type,
        ]);
    
        // Jika password diisi, update password
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
            $user->save();
        }
    
        return redirect("/user")->with("success", "Sukses mengupdate akun");
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return back()->with("success", "Success delete account");
    }
}
