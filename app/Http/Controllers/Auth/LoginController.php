<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
    	$credentials = $request->only(['email','password']);

    	if (Auth::attempt($credentials)) {
  			return redirect()->intended('dashboard');
    	}else{
    		return redirect()->to('login')->with('error','Login Gagal !');
    	}
    }
}
