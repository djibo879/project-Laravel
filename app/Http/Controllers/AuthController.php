<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
{
   /* User::create([
       'name'=>'ibrahim',
        'email'=>'ib.djibo@icloud.com',
        'password'=>Hash::make('1234')
    ]); */

    
    return view('auth.login');
}

 public function doLogin(LoginRequest $request)
    {
        $credentials = $request->validated();
       if (Auth::attempt($credentials)) {
    $request->session()->regenerate();
    return redirect()->intended(route('admin.property.index'));
}

        return back()->withErrors([
            'email' => 'Identifiants incorrect'
        ])->onlyInput('email');
    }



public function logout()
{
    Auth::logout();
    return to_route('login')->with('success', 'Vous êtes déconnecté');
}
}
