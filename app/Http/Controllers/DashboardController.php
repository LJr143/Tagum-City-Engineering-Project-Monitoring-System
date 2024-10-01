<?php

namespace App\Http\Controllers;


use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::first();
        $totalUsers = User::count();

        return view('layouts.dashboard', compact('user', 'totalUsers'));
    }
}
