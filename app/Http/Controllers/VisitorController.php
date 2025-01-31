<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Visitor;
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

        // Log::debug('data',request()->all());

        try{
    $validatedData = request()->validate([
        'full_name' => 'required',
        'email' => '',
        'phone_number' => 'required',
        'employee' => 'required',
        'company_name' => '',
        'access_card_number' => 'required',
        'vehicle_number' => '',
        'purpose' => 'required',
        'comment' => '',
        'devices' => 'nullable|array',
        'dependents' => 'nullable|array',
    ]);


    $name = explode(' ', $validatedData['full_name']);

    $firstName = $name[0];
    $lastName = $name[1];

    $devicesJson = request()->has('devices') ? ($validatedData['devices']) : null;

    $dependedntsJson = request()->has('dependents') ? ($validatedData['dependents']):null;


    // Log::debug($devicesJson);
    // Log::debug($dependedntsJson);

    Visitor::create([
        'first_name' => $firstName,
        'last_name' => $lastName,
        'email' => $validatedData['email'],
        'phone_number' => $validatedData['phone_number'],
        'employee_Id' => $validatedData['employee'],
        'company_name' => $validatedData['company_name'],
        'access_card_number' => $validatedData['access_card_number'],
        'vehicle_number' => $validatedData['vehicle_number'],
        'purpose' => $validatedData['purpose'],
        'comment' => $validatedData['comment'],
        'devices' => $devicesJson,
        'status' => 'ongoing',
        'dependents' => $dependedntsJson,
    ]);

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
                'departed_at' => now(),
                'status' => 'departed',
            ]);

                // dd($visitor);


                // echo 'exit';
            }
}
