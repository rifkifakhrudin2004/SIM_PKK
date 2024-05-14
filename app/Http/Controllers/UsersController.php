<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Models\UsersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('users.index');
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        UsersModel::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'level_users' => $request->level_users,
            'status' => $request->status,
        ]);

        return redirect('/users');
    }

    public function edit($id)
    {
        $user = UsersModel::find($id);
        return view('users.edit', ['data' => $user]);
    }

    public function edit_simpan($id, Request $request)
    {
        $user = UsersModel::find($id);
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->level_users = $request->level_users;
        $user->status = $request->status;
        $user->save();

        return redirect('/users');
    }

    public function delete($id)
    {
        $user = UsersModel::find($id);
        $user->delete();

        return redirect('/users');
    }
}
