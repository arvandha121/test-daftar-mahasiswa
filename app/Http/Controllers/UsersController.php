<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index() {
        $data = Users::all();
        return view('layouts/users/users')->with('data', $data);
    }
}
