<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Activities;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class UserAuthController extends Controller
{
    public function login(Request $request){

        // Log::debug($request->all());
        // $attributes = $request->validate([
        //     'email'=>   ['required', 'email'],
        //     'password'=> ['required'],
        // ]);

        $login = $request->input('email');

        $user = User::where('email', $login)->orWhere('username',$login)->first();

        if(!$user){
            return redirect()->back()->withErrors(['email'=>'Invalid login credentials']);
        }

        $request->validate([
            'password'=>'required'
        ]);


        if($request->password == 'NewSecurity@1234'){
            
            return redirect()->withErrors([
                'password'=>'New User! Please reset your password'
            ]);
        }

        if(!Auth::attempt(['email'=>$user->email, 'password'=>$request->password])  ||

            !Auth::attempt(['username'=>$user->username, 'password'=>$request->password])
        ){
            throw ValidationException::withMessages([
                'email'=>'Wrong credentials. Please try again'
            ]);
        }

        request()->session()->regenerate();
        // session('logged_in', true);

        $_SESSION['logged_in'] = TRUE;
        

        Activities::log(
            action: 'login',
            description: User::find(Auth::id())->name . ' logged in'
        );

        return redirect('/')->with(
            'success',
            'Welcome back, ' . User::find(Auth::id())->name
        );
    }


    public function logout(Request $request){
         Activities::log(

                action: 'logout',
                description: User::find(Auth::id())->name . ' logged out'
          );
       Auth::logout();
       session()->flush();
       return redirect('login');
    }
}
