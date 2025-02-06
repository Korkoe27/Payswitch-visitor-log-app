<?php

namespace App\Http\Controllers;

use App\Models\VisitorAccessCard;
use Illuminate\Http\Request;

class VisitorAccessCardController extends Controller
{
    public function create()
    {
        return view('visitor_access_card.create');
    }


    public function store(){
        request()->validate([
            'card_number' => 'required',

        ]);

        VisitorAccessCard::create([
            'card_number' => request('card_number'),
            'status'=> 'available',
        ]);



    }
}
