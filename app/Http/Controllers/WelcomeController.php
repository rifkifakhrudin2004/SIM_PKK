<?php

namespace App\Http\Controllers;

use App\Models\KontenModel;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $upload = KontenModel::select('foto_konten', 'deskripsi_konten')->get();

        return view('welcome', compact('upload'));
    }
}
