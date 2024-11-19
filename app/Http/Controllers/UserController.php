<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $currentPage = $request->query('page', 1);

        $users = User::paginate(10);

        return view('layouts.user.manageUser', compact('users', 'currentPage'));

    }



}
