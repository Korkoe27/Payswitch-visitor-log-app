<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Activities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UserAuthController extends Controller
{
    public function login(Request $request){
        $attributes = request()->validate([
            'email'=>   ['required', 'email'],
            'password'=> ['required'],
        ]);

        if(!Auth::attempt($attributes)){
            throw ValidationException::withMessages([
                'email'=>'Sorry this user does not exist. Contact Support for assistance'
            ]);
        }

        request()->session()->regenerate();

        Activities::log(
            action: 'login'
        );

        return redirect('/');
    }

    public function logout(Request $request){
       Auth::logout();
       return redirect('login');
    }
}
