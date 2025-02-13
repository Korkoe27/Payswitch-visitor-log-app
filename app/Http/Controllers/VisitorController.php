<?php

namespace App\Http\Controllers;

use App\Models\AccessCards;
use App\Models\Employee;
use App\Models\Visitor;
use App\Models\VisitorAccessCard;
use Carbon\Carbon;
use Exception;
use Hamcrest\Arrays\IsArray;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class VisitorController extends Controller
{
   

    public function create(){
        $employees = Employee::get();
        return view('visitor.entry', compact('employees'));

    }


    public function store(){
        

        // dd(request());
        $availableCards = VisitorAccessCard::where('status', 'available')->get();

        function getCardId($index, $availableCards){
            Log::debug("Size Of Available Cards: ". sizeof($availableCards));
            Log::debug("index + 1: " . $index+1);
            try{
                if( $index+1 <= sizeof($availableCards)){
                    return $availableCards[$index];
                }else{
                    return 0;
                }
                /*if(isset($availableCards[$index])){

                    Log::debug('Function card Id'. $availableCards[$index]);
                    return $availableCards[$index];
                }else{
                    Log::debug("Else 0");
                    return 0;
                }  */ 

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



    $name = explode(' ', $validatedData['full_name']);

    $firstName = $name[0];
    $lastName = $name[1];

    $devicesJson = request()->has('devices') ? ($validatedData['devices']) : null;

    $companionJson = request()->has('companions') ? ($validatedData['companions']):null;

    $countVisitors = count($companionJson)+1;

    // 




    

    // Log::debug($devicesJson);
    // Log::debug($countVisitors);



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

    
    // Log::debug('Saved Dependents:', $visitor->dependents);
    $lastInsertedId = $visitor->id;

    //     Log::debug('korkoe');
                Log::debug('Last Inserted Id first: '. $lastInsertedId);


    if($availableCards->count() > 0){

        // Log::debug("Card Number",["Cards"=>$availableCards[0]->card_number]);

Log::debug('Number of visitors: '.$countVisitors);
        for($card = 0; $card < $countVisitors; $card++){
            $card_number = getCardId($card, $availableCards);

            DB::table('access_cards')->insert([
                'visitor_id'=>$lastInsertedId,
                'card_number'=>is_object($card_number)?$card_number['card_number']:$card_number
            ]);

            if(is_object($card_number)){
                DB::table('visitor_access_cards')
                    ->where('card_number','=',$card_number['card_number'])
                    ->update(['status'=>'unavailable']);
            }

        //     $card_id    = 'N/A';

        //     if(isset($card_number)){
        //         $card_id = $card_number['card_number'];
        //     }

        // DB::table('access_cards')->insert([
        //     'visitor_id'=>$lastInsertedId,
        //     'card_number'=>$card_id,
        // ]);

        /*Log::debug(gettype($card_number));
        if(is_object($card_number)){
            Log::debug("Loop: ". $card_number['card_number']); 
            DB::table('access_cards')->insert([
                'visitor_id'=>$lastInsertedId,
                'card_number'=>$card_number['card_number']
            ]);
        }else{
            Log::debug("Loop: ". $card_number); 
            DB::table('access_cards')->insert([
                'visitor_id'=>$lastInsertedId,
                'card_number'=>$card_number
            ]);
        }*/
        
          /* if(is_object($card_number)){
                
        Log::debug("Visitor Count: ". $card);
        Log::debug("Loop: ". $card_number['card_number']);        


                DB::table('access_cards')->insert([
            'visitor_id'=>$lastInsertedId,
            'card_number'=>$card_number['card_number'],
        ]);

            }   else{

                Log::debug("Test failed");
            //DB::table('access_cards')->insert(['visitor_id'=>$lastInsertedId,
            //'card_number'=>"Null"
               // ]); 
                Log::debug("Visitor Count: ". $card);

                Log::debug('Last Inserted Id'. $lastInsertedId);
               
            }

            // dd($card_number);

   

   

        DB::table('visitor_access_cards')
        ->where('card_number','=',$card_number['card_number'])
        ->update(['status'=>'unavailable']);*/
        }



    }   else{


        DB::table('access_cards')->insert([
            'visitor_id'=>$lastInsertedId,
            'card_number'=>NULL
        ]);

    }


        Log::debug("completed");

    return redirect('/')->with('success', 'Visitor record created successfully!');

        }   catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => 'An error occurred while creating the visitor record.']);

        }
    }


    public function show(Visitor $visitor){
        
    return view('visitor.show', ['visitor' => $visitor]);
    }



    public function departure(Visitor $visitor){


        return view('visitor.exit', ['visitor' => $visitor]);
    }

            public function exit(Request $request, Visitor $visitor){
                // $visitor = Visitor::findOrFail($visitor->id);

                // Log::debug($request->query('visitor'));
                

                

                // Log::debug('data',request()->all());

                request()->validate([
                    'rating'=> 'required',
                    'visitor_experience' => '',
                    'marketing_consent' => '',  
                ]);


//   Log::debug(base64_decode(request('masked_id')));

                $visitor_id = base64_decode(request('masked_id'));
                $visitor = Visitor::findOrFail(id: $visitor_id);
              
                // DB::table('visitor')->where('id', $visitor_id)->update([
                //     'rating' => request('rating'),
                //     'visitor_experience' => request('visitor_experience'),
                //     'marketing_consent' => request('marketing_consent'),
                //     'status' => 'departed',
                // ]);

            $visitor->update([
                'rating' => request('rating'),
                'visitor_experience' => request('visitor_experience'),
                'marketing_consent' => request('marketing_consent'),
                'departed_at' =>Carbon::now(),
                'status' => 'departed'
            ]);

            return redirect('/')->with('success', 'Visitor record updated successfully!');


            }
}
