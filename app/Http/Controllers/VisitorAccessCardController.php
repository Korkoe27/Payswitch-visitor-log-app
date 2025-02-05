<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisitorAccessCardController extends Controller
{
    public function create()
    {
        return view('visitor_access_card.create');
    }
}
