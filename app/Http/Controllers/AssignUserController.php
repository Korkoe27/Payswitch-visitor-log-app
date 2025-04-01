<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\AssignUser;
use App\Models\{Activities, Employee, Roles, User};
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Validation\Rules\Password as PasswordRules;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\{DB,Hash,Log,Mail};
use Illuminate\Support\Str;

class AssignUserController extends Controller
{
    
    //display all users
    public function index(){
        $users = User::all();

        return view('users.index',compact('users'));
    }




    //add a new user
    public function create(){
        $employees = Employee::whereNotIn('email', function ($query) {
            $query->select('email')->from('users');
        })->get();

        $roles = Roles::get();


        return view('users.create',compact('employees','roles'));
    }



    //store the user and send an email to reset password

    public function store(Request $request){
        $request->validate([
            'employee_id'=> 'required|exists:employees,id',
            'role_id'=> 'required|exists:roles,id',
        ]);

        
        Log::debug($request->all());        
        try{
            return DB::transaction(function () use ($request){
                $employee = Employee::findOrFail($request->employee_id);
                $role = Roles::findOrFail($request->role_id);
                // $token =Str::random(60);
                $user = User::create([
                    'name' => trim(implode(' ', [
                        $employee->first_name, 
                        $employee->other_name ?? '', 
                        $employee->last_name
                    ])),
                    'email' => $employee->email,
                    'role_id' => $request->input('role_id'),
                    'password' => Hash::make(Str::random(16)),
                    // 'password_reset_token' => $token,
                ]);
                



                $token = Password::createToken($user);

                Log::debug("new token" . $token);

                Log::debug("NEW USER: " . $user);
                Log::debug("Role Info : " . $role);

                Mail::to($user->email)->send(new AssignUser($user, $token));

                Log::debug('Mail Sent');

        $employee->update(['is_user' => true]);

        
        Activities::log(
            action: 'Added a new user',
            description: 'Assigned ' . $role->name . ' role to ' . $employee->first_name . ' ' . $employee->last_name
        );

        return redirect()->back()->with('success', 'User created successfully. An invitation email has been sent.');

        });
        }catch (\Exception $e){

            Log::error('User creation failed: ' . $e->getMessage());
            // return redirect('/')->with('error', 'An error occurred. Please try again later.');
        }
    }



    //display reset password form


    public function showResetForm(Request $request, $token){
        Log::debug("Token: " . $token);
        // dd($request->all());
        return view('auth.reset-password',[
            'token' => $token,
            'email'=> $request->email
        ]);
    }

    //reset password

    public function resetPassword(Request $request){

        // dd($request->all());
        $validated = $request->validate([
        'token'=>'required',
        'email' => 'required|email',
        'password'=>[
            'required',
            'confirmed',
            PasswordRules::min(8)
            ->letters()
            ->mixedCase()
            ->numbers()
            ->symbols()
        ],
        ]);
        Log::debug("Validated Data: " , $validated);

        $status = Password::reset(
            $request->only('email','password','password_confirmation','token'),
            function    ($user, $password){
                $user->forceFill([
                    'password'=>Hash::make($password),
                    // 'password_reset_token'=>null,
                ])->save();

                event(new PasswordReset($user));
            }
        );

        Log::debug("Status: " . $status);

        // return $status == Password::PASSWORD_RESET
        // ? redirect()
        // ->route('login')
        // ->with('status', __($status))
        // : back()->withErrors(['email' => [__($status)]]);

        return $status == Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            :   back()->withErrors(['email'=> [__($status)]]);
    }

    
}
