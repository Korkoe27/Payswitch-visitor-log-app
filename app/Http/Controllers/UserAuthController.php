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

        try{

        
        $attributes = $request->validate([
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
            action: 'login',    
            description: ' logged in!'
        );

        return response()->json([
            'success'=>true,
            'message'=>'Welcome back! You have successfully logged in',
            'redirect'=>route('/')
        ]);

    } catch (ValidationException $e) {
        return back()->withErrors($e->errors())->withInput();
    } catch (\Exception $e) {
        Log::error('Login error: ' . $e->getMessage());
        return back()->with('error', 'An unexpected error occurred. Please try again.');
    }
    }

    public function logout(Request $request){
       Auth::logout();
       return redirect('login');
    }
}
