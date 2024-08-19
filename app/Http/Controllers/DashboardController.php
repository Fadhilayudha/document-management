<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $userAccount = User::all();
        $countUser = count($userAccount);
        return view('pages.dashboard', compact('countUser'));
    }
}
