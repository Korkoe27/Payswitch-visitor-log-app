<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Activities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class UserAuthController extends Controller
{
    public function login(Request $request){

        // Log::debug($request->all());
        $attributes = request()->validate([
            'email'=>   ['required', 'email'],
            'password'=> ['required'],
        ]);

        if(!Auth::attempt($attributes)){
            throw ValidationException::withMessages([
                'email'=>'Wrong credentials. Please try again'
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
