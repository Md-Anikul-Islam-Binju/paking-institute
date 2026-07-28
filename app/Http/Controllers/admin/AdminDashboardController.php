<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ManagementBoard;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalExpertise = ManagementBoard::count();
        return view('admin.dashboard', compact('totalExpertise'));
    }

    public function unauthorized()
    {
        return view('admin.unauthorized');
    }
}
