<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\UsersDataTable;
use App\Models\KontenModel;

class KontenController extends Controller
{
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('konten.index');
    }
}
