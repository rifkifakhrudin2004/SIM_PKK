<?php
namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Models\UsersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function dashboard()
    {
        return view('users.dashboard', ['activeMenu' => 'dashboard']);
    }

    public function index(UsersDataTable $dataTable)
    {
        $activeMenu = 'users';  
        return $dataTable->render('users.index', compact('activeMenu'));
    }
    
    public function create()
    {
        $activeMenu = 'users';
        $levelUsersOptions = UsersModel::getLevelUsersOptions();
        $statusOptions = UsersModel::getStatusOptions();
        $AdminOptions = UsersModel::getAdminOptions();

        return view('users.create', compact('activeMenu', 'levelUsersOptions', 'statusOptions', 'AdminOptions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'level_id' => 'required|integer',
            'status' => 'required|string',
            'id_admin' => 'required|integer',
        ]);

        UsersModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
            'level_id' => $request->level_id,
            'status' => $request->status,
            'id_admin' => $request->id_admin,
        ]);

        return redirect()->route('users.index');  
    }

    public function edit($id)
    {
        $user = UsersModel::find($id);

        $activeMenu = 'users';
        $levelUsersOptions = UsersModel::getLevelUsersOptions();
        $statusOptions = UsersModel::getStatusOptions();
        $AdminOptions = UsersModel::getAdminOptions();

        return view('users.edit', compact('user', 'levelUsersOptions', 'statusOptions', 'AdminOptions', 'activeMenu'));
    }

    public function edit_simpan($id, Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'password' => 'nullable|string|min:8',
            'level_id' => 'required|integer',
            'status' => 'required|string',
            'id_admin' => 'required|integer',
        ]);

        $user = UsersModel::find($id);
        $user->username = $request->username;
        $user->nama = $request->nama;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->level_id = $request->level_id;
        $user->status = $request->status;
        $user->id_admin = $request->id_admin;
        $user->save();

        return redirect()->route('users.index'); 
    }

    public function delete($id)
    {
        $user = UsersModel::find($id);
        $user->delete();

        return redirect()->route('users.index'); 
    }
}
