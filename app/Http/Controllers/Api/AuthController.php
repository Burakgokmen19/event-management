<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Nette\Schema\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
          $request->validate([
              'email'=>'required|email',
              'password'=>'required'
          ]);
    }
    public function logout(Request $request)
    {
        $user = \App\Models\User::where('email',$request->email)->first();
        if (!$user)
        {
            throw  ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.']
            ]);
        }
    }
}
