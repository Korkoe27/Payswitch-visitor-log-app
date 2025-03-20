<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AssignUserController extends Controller
{
    public function index(){
        $users = User::all();

        return view('users.index',compact('users'));
    }


    public function create(){
        $employees = Employee::whereNotIn('email', function ($query) {
            $query->select('email')->from('users');
        })->get();

        $roles = Roles::get();


        return view('users.create',compact('employees','roles'));
    }

    public function store(){
        request()->validate([
            'user_id'=> 'required|exists:users,id',
            'role_id'=> 'required|exists:roles,id',
        ]);

        $user = User::findOrFail(request('user_id'));


        $defaultPassword = 'NewUser1'; 

        $user->save([
            'role_id'=>request('role_id'),
            'name'=>$user->first_name,
            'email'=>$user->email,
            'password'=>Hash::make($defaultPassword),

        ]);

        Mail::to($user->email)->send(new ResetPassword($user));
    }
}
