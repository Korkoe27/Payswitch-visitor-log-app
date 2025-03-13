<?php

namespace App\Http\Controllers;

use App\Models\Activities;
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
        $visitorAccessCards = VisitorAccessCard::simplePaginate(15);
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

        Activities::log(
            action: 'Created New Visitor Access Card.',
            description: 'New Card with ID: ' . request('card_number')
        );

        return redirect('access-cards');

    }
}
