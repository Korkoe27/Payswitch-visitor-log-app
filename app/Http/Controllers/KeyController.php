<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use App\Models\Employee;
use App\Models\Key;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class KeyController extends Controller
{

    
public function create(){
    return view('keys.create-key');
}

//create a new key

public function store(){
    request()->validate([
        'key_number'=>'required',
        'key_name'=>'required',
    ]);

    Key::create([
        'key_number'=>request('key_number'),
        'key_name'=>request('key_name'),
        // 'status'=>'available',
    ]);

    Activities::log(
        action: 'Created New Key',
        description: 'New key with ID: ' . request('key_number')
    );

    return redirect('/all_keys');
}

//show all keys


public function keys(){
    $keys = Key::get();
    return view('keys.index', compact('keys'));
}



//delete a key
public function destroy($id){
    try {
        $key = Key::findOrFail($id);
        $key->delete();
    Activities::log(
        action: 'Deleted a key',
        description: 'Deleted the ' . $key->key_name . 'key'
    );


        return response()->json([
            'success' => true,
            'message' => 'Key deleted successfully'
        ], 200);

    } catch(\Exception $e) {
        return response()->json([
            'success' => false,
            'error' => 'Failed to delete key'
        ], 500);
    }

}

}
