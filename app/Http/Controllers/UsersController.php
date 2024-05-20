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
        $levelUsersOptions = UsersModel::getLevelUsersOptions();
        $statusOptions = UsersModel::getStatusOptions();
        $AdminOptions  = UsersModel::getAdminOptions();

        return view('users.create', compact('levelUsersOptions', 'statusOptions','AdminOptions'));
    }

    public function store(Request $request)
    {
        UsersModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
            'level_id' => $request->level_id,
            'status' => $request->status,
            'id_admin'=>$request->id_admin,
        ]);

        return redirect('/user');
    }

    public function edit($id)
    {
        $user = UsersModel::find($id);
        $levelUsersOptions = UsersModel::getLevelUsersOptions();
        $statusOptions = UsersModel::getStatusOptions();

        return view('users.edit', ['data' => $user, 'levelUsersOptions' => $levelUsersOptions, 'statusOptions' => $statusOptions]);
    }

    public function edit_simpan($id, Request $request)
    {
        $user = UsersModel::find($id);
        $user->username = $request->username;
        $user->nama = $request->nama;
        $user->password = Hash::make($request->password);
        $user->level_id = $request->level_id;
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
