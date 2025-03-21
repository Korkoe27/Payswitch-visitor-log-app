<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Roles;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index(){
        $roles =Roles::get();

        return view('roles.index',compact('roles'));
    }


    public function create(){
        return view('roles.create');
    }

    public function store(){
    
    }
}
