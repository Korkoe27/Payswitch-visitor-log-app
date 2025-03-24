<?php

namespace App\Http\Controllers;

use App\Models\AccessCards;
use App\Models\Activities;
use App\Models\Employee;
use App\Models\Visitor;
use App\Models\VisitorAccessCard;
use Carbon\Carbon;
use Exception;
// use App\Services\OtpService;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Http;

class VisitorController extends Controller
{


    // private $otpService;

    // public function __construct(OtpService $otpService)
    // {
    //     $this->otpService = $otpService;
    // }
    

    public function index(){


        return view('visitor.visits',[
            'visitor' => Visitor::orderBy('status')->simplePaginate(10),

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
        Activities::log(
            action: 'Logged Visitor',
            description: $countVisitors . " person(s) logged."
        );

    return redirect('/')->with('success', 'Visitor record created successfully!');

        }   catch(Exception $e){
            return redirect()->back()->withErrors(['error' => 'An error occurred while creating the visitor record.']);

        }
    }


    public function show(Visitor $visitor)
    {
        $access_cards = DB::table('access_cards')
            ->where('visitor_id', $visitor->id)
            ->get();

    
        return view('visitor.show', compact('visitor', 'access_cards'));
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

            Activities::log(
                action: ' Visitor Departed',
                description: $visitor->first_name . ' ' . $visitor->last_name . ' departed.'
            );

            return redirect('/')->with('success', 'Visitor record updated successfully!');


            }

            public function checkVisitor(){
                return view('visitor.old-visitor');
            }


            public function oldVisitorSignIn($visitor){
                $visitor =Visitor::findOrFail($visitor);
                $employees = Employee::get();
                return view('visitor.old-visitor-sign-in',compact('visitor','employees'));
            }


            public function oldVisitor(Request $request)
            {
                $request->validate([
                    'phone_number' => 'required'
                ]);
            
                $visitor = Visitor::where('phone_number', $request->phone_number)->first();
            

                $headers = [
                    'Content-Type: application/json',
                    'Authorization: Basic '  . base64_encode('Testfa5348423c6b6533e0b04a7ed496d29f:975kp*4ZuLAE0%$R@Xeot^3#')
                ];


                $authkey = base64_encode('Testfa5348423c6b6533e0b04a7ed496d29f:975kp*4ZuLAE0%$R@Xeot^3#');
                
                if ($visitor) {
                    try {
                        Log::debug("Auth Key: ". $authkey);
                        $response = Http::withHeaders($headers)->post('https://smpp.theteller.net/send/single', [
                            "phonenumber" => "233558731186",
                            "sender"=>"Payswitch",
                            "message"=>"Your OTP is here"
                        ]);
                        Log::debug("Response: ". $response->data());
                        if ($response->successful()) {
                            session(['otp_key' => $response['key'], 'phonenumber' => $request->phone_number]);
                            return response()->json(['success' => true, 'message' => 'OTP sent successfully.']);
                        }
                    } catch (Exception $e) {
                        Log::error('OTP sending failed: ' . $e->getMessage());
                        return response()->json(['success' => false, 'message' => 'Failed to send OTP.']);
                    }
                }
            
                return response()->json([
                    'success' => false,
                    'redirect' => url('create-visit'),
                    'message' => 'First time visiting? Please sign up.'
                ]);
            }
        
            public function verifyOtp(Request $request)
            {
                $request->validate(['otp' => 'required']);
            
                $phone_number = session('phone_number');
                $otpKey = session('otp_key');
            
                if (!$phone_number || !$otpKey) {
                    return response()->json(['success' => false, 'message' => 'Session expired. Try again.'], 400);
                }
            
                try {
                    $response = Http::post('https://smpp.theteller.net/pin/verify', [
                        'phone_number' => $phone_number,
                        'otp' => $request->otp,
                        'key' => $otpKey
                    ]);
            
                    if ($response->successful()) {
                        session()->forget(['otp_key', 'phone_number']);
                        $visitor = Visitor::where('phone_number', $phone_number)->first();
                        return response()->json([
                            'success' => true,
                            'redirect' => route('old-visitor', $visitor->id),
                            'message' => 'OTP verified successfully!'
                        ]);
                    }
                } catch (Exception $e) {
                    Log::error('OTP verification failed: ' . $e->getMessage());
                }
            
                return response()->json(['success' => false, 'message' => 'Invalid OTP. Please try again.'], 400);
            }
            

        
}
