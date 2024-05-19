<?php  
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\UsersDataTable;
use App\Models\KontenModel;

class KontenController extends Controller
{
    public function index(UsersDataTable $dataTable)
    {
        // Tambahkan variabel $activeMenu
        $activeMenu = 'konten';
        return $dataTable->render('konten.index', compact('activeMenu'));
    }
}
