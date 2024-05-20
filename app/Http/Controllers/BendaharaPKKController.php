<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BendaharaPKKController extends Controller
{
    public function dashboard()
    {
        return view('bendaharaPKK.dashboard', ['activeMenu' => 'dashboard']);
    }
}
