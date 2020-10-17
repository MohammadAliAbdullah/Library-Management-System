<?php
namespace App\Http\Controllers\admin;

// use App\Students;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }
}
