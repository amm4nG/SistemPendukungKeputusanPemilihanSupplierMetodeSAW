<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Supplier;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $totalBarang = Barang::count();
        $totalSupplier = Supplier::count();
        return view('admin.home', compact(['totalBarang', 'totalSupplier']));
    }
}
