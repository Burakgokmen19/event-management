<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\User;
use http\Env\Response;
use http\Message;
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
        $user = \App\Models\User::where('email',$request->email)->first();
        if (!$user) {
            throw  ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.']
            ]);
        }
        $token = $user->createToken('api-token')->plainTextToken;
        return response()->json([
            'token'=>$token
        ]);
    }
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json([
             'message' => 'başarıyla silindi'
        ]);
    }
}
