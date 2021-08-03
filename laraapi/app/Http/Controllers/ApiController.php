<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function user()
    {
        $user = User::get();
        return response()->json($user, 200);
    }

    public function delete($id)
    {
        $user  = User::find($id);
        $user->forceDelete();
        return response(200);
    }

    public function edit($id)
    {
        $user  = User::find($id);
        return response()->json($user, 200);
    }

    public function editUser(Request $req, $id)
    {
        $user  = User::find($id);
        $user->name = $req->name;
        $user->password = $req->password;
        $user->type = $req->type;
        $user->dept = $req->dept;
        $user->save();
        return response()->json($user, 200);
    }

    public function create(Request $req)
    {
        $user  = new User;
        $user->name = $req->name;
        //$user->password = $req->password;
        //$user->type = $req->type;
        $user->dept = $req->dept;
        $user->save();
        return response()->json($user, 200);
    }
}