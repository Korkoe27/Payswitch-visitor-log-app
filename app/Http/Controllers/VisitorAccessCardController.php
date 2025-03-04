<?php

namespace App\Http\Controllers;

use App\Models\VisitorAccessCard;
use Illuminate\Http\Request;

class VisitorAccessCardController extends Controller
{




    //show all visitor access cards
    public function create()
    {
        return view('visitor_access_card.create');
    }

    public function index(){
        $visitorAccessCards = VisitorAccessCard::all();
        return view('visitor_access_card.index',compact('visitorAccessCards'));
    }

    public function store(){
        request()->validate([
            'card_number' => 'required',

        ]);

        VisitorAccessCard::create([
            'card_number' => request('card_number'),
            'status'=> 'available',
        ]);

        return redirect('access-cards');

    }
}
