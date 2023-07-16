<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SessionController extends Controller
{
    function index(){
        return view('layouts/auth/login');
    }
    
    function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi'
        ]);
    
        if ($validator->fails()) {
            return redirect('/login')
                ->withErrors($validator)
                ->withInput();
        }
    
        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];
        
        if (Auth::attempt($infologin)) {
            return redirect("/dashboard");
        } else {
            return redirect('/login');
        }
    }
}
