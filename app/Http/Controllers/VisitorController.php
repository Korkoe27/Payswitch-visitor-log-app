<?php

namespace App\Http\Controllers;

use App\Models\AccessCards;
use App\Models\Employee;
use App\Models\Visitor;
use App\Models\VisitorAccessCard;
use Carbon\Carbon;
use Exception;
use OTPHP\TOTP;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class VisitorController extends Controller
{


    

    public function index(){


        return view('visitor.visits',[
            'visitor' => Visitor::where('status', 'ongoing')->simplePaginate(10),
    
            'departed' => Visitor::where('status', 'departed')->simplePaginate(5),

        ]);
    }

    
    public function create(){
        $employees = Employee::get();
        return view('visitor.entry', compact('employees'));

    }


    public function store(){
        

        $availableCards = VisitorAccessCard::where('status', 'available')->get();


        // dd($availableCards);

        function getCardId($index, $availableCards){
            Log::debug("Size Of Available Cards: ". sizeof($availableCards));
            Log::debug("index + 1: " . $index+1);
            try{
                if( $index+1 <= sizeof($availableCards)){
                    return $availableCards[$index];
                }else{
                    return 0;
                }


            }   catch (Exception $exception){

                Log::debug("Exception");
                    return 0;
            }
        }

        try{
    $validatedData = request()->validate([
        'full_name' => 'required',
        'email' => '',
        'phone_number' => 'required',
        'employee' => 'required',
        'company_name' => '',
        'purpose' => 'required',
        'devices' => 'nullable|array',
        'companions' => 'nullable|array',
    ]);



    $name = explode(' ', string: $validatedData['full_name']);

    $firstName = $name[0];
    $lastName = $name[1];

    $devicesJson = request()->has('devices') ? ($validatedData['devices']) : null;

    $companionJson = request()->has('companions') ? ($validatedData['companions']):null;

    $countVisitors = count($companionJson)+1;




    $visitor = Visitor::create([
        'first_name' => $firstName,
        'last_name' => $lastName,
        'email' => $validatedData['email'],
        'phone_number' => $validatedData['phone_number'],
        'employee_Id' => $validatedData['employee'],
        'company_name' => $validatedData['company_name'],
        'purpose' => $validatedData['purpose'],
        'devices' => $devicesJson,
        'status' => 'ongoing',
        'companions' => $companionJson,
    ]);

    
    $lastInsertedId = $visitor->id;

    
    Log::debug("Last Visitor ID: ". $lastInsertedId);


    if($availableCards->count() > 0){



        for($card = 0; $card < $countVisitors; $card++){
            $card_number = getCardId($card, $availableCards);


            Log::debug("Card Number: ". $card_number['card_number']);

            // try{
            DB::table('access_cards')->insert([
                'visitor_id'=>$lastInsertedId,
                'card_number'=>is_object($card_number)?$card_number['card_number']:$card_number
            ]);

            // }catch(Exception $e){
                // Log::debug("Error: ". $e);
            // }

            try{

            if(is_object($card_number)){
                DB::table('visitor_access_cards')
                    ->where('card_number','=',$card_number['card_number'])
                    ->update(['status'=>'unavailable']);
            }
        }catch(Exception $e){
            Log::debug("Error: ". $e);

        }
        }



    }   else{


        DB::table('access_cards')->insert([
            'visitor_id'=>$lastInsertedId,
            'card_number'=>NULL
        ]);

    }


        Log::debug("completed");

    return redirect('/')->with('success', 'Visitor record created successfully!');

        }   catch(Exception $e){
            return redirect()->back()->withErrors(['error' => 'An error occurred while creating the visitor record.']);

        }
    }


    public function show(Visitor $visitor){
        $access_cards = DB::table('access_cards')
            ->where('visitor_id', $visitor->id)
            ->get();
    return view('visitor.show', ['visitor' => $visitor])->with('access_cards', $access_cards);
    }



    public function departure(Visitor $visitor){


        return view('visitor.exit', ['visitor' => $visitor]);
    }

            public function exit(Request $request, Visitor $visitor){


                request()->validate([
                    'rating'=> '',
                    'visitor_experience' => '',
                    'marketing_consent' => '',  
                ]);



                

                $visitor_id = base64_decode(request('masked_id'));
                $visitor = Visitor::findOrFail(id: $visitor_id);

                $access_cards = DB::table('access_cards')
                    ->where('visitor_id', $visitor_id)
                    ->get();

                if($access_cards->count()>0){
                    foreach($access_cards as $card){
                        $card_number = $card->card_number;
                        if($card_number != NULL){
                            DB::table('visitor_access_cards')
                                ->where('card_number', $card_number)
                                ->update(['status'=>'available']);
                        }
                    }
                }

                    // Log::debug('Access Cards: '. $access_cards);

            $visitor->update([
                'rating' => request('rating'),
                'visitor_experience' => request('visitor_experience'),
                'marketing_consent' => request('marketing_consent'),
                'departed_at' =>Carbon::now(),
                'status' => 'departed'
            ]);



            return redirect('/')->with('success', 'Visitor record updated successfully!');


            }

            public function checkVisitor(){
                return view('visitor.old-visitor');
            }


            public function oldVisitor(Request $request)
            {
                // Validate the request
                $request->validate([
                    'phone_number' => 'required'
                ]);
            
                // Fetch visitor
                $visitor = Visitor::where('phone_number', $request->phone_number)->first();

            
                if ($visitor) {
                    $employees = Employee::get();
                    return view('visitor.old-visitor-sign-in',compact('visitor','employees'));
                    // return redirect('old-visitor')->with('visitor', $visitor);
                } else {
                    return redirect('create-visit')->with('error', 'First Time Visiting? Please Sign up.');

                }
            }
            

        
}
