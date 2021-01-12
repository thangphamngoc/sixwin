<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    public function init()
    {
        return response()->json(['user'=>Auth::user()],200);
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['username'=>$request->username, 'password'=>$request->password],true)){
            return response()->json(Auth::user(),200);
        }else{
            return response()->json(['error'=>'Could not log you in.'],401);
        }
    }

    public function logout()
    {
        Auth::logout();
    }

    public function register(Request $request)
    {
        $user = User::where('username', $request->username)->first();
        if (isset($user->id)){
            return response()->json(['error'=>'Username alredy exits'],401);
        }

        $user = new User();
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->email = $request->email;
        $user->save();

        Auth::login($user);

        return response()->json($user,200);
    }
}
