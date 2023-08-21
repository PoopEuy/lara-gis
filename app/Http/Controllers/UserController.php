<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
   function index(){
        $data = array(
            'title' => 'Data User',
            'data_user' => User::all(),
        );

        return view('master.user.userList', $data);
    }


   function store(Request $request){
      User::create([
      'name' => $request->nama,
      'email' => $request->email,
      'password' => Hash::make($request->password),
      'role' => $request->selectRole,

      ]);

      return redirect('/user')->with('success', 'data berhasil disimpan');
   }

   function update(Request $request, $id){
      User::where('id', $id)->update([
      'name' => $request->editNama,
      'email' => $request->editEmail,
      'password' => Hash::make($request->editPassword),
      'role' => $request->editRole,
      ]);

      return redirect('/user')->with('success', 'data berhasil diubah');
   }

   function destroy($id){
      User::where('id', $id)->delete();

      return redirect('/user')->with('success', 'data berhasil dihapus');
   }
}
