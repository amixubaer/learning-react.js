<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        // $users  = User::all();
        $users = DB::table('users')->get();
        return view('user.list')->with('userList', $users);
    }

    public function details($id)
    {
        $user  = User::find($id);
        return view('user.details')->with('user', $user);
    }

    public function delete($id)
    {
        $user  = User::find($id);
        $user->forceDelete();
        return redirect()->route('user.index');
    }

    public function edit($id)
    {
        $user  = User::find($id);

        return view('user.edit')->with('user', $user);
    }

    public function editUser(Request $req, $id)
    {
        $user  = User::find($id);
        $user->name = $req->name;
        $user->password = $req->password;
        $user->type = $req->type;
        $user->dept = $req->dept;
        $user->save();

        return redirect()->route('user.index');
    }

    public function create()
    {
        return view('user.create');
    }

    public function createUser(Request $req)
    {
        User::create([
            'name' => $req->uname,
            'password' => $req->password,
            'type' => $req->type,
            'dept' => $req->dept,
        ]);

        return redirect()->route('user.index');
    }
}