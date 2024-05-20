<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KetuaPKKController extends Controller
{
    public function dashboard()
    {
        return view('ketuaPKK.dashboard', ['activeMenu' => 'dashboard']);
    }
}
