<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index',    [
        'visitors'  =>  [
            [
                'name'  =>  'Korkoe Dumashie',
                'visiting' =>  'Joe Boateng',
                'purpose'   =>  'personal',
                'time_in'   =>  '09:15am'
            ],
            [
                'name'  =>  'Brian Elorm',
                'visiting' =>  "Clarence 'Gabe' Ahiabor",
                'purpose'   =>  'interview',
                'time_in'   =>  '09:15am'
            ],
            [
                'name'  =>  'Bismark Amo',
                'visiting' =>  'Joe Boateng',
                'purpose'   =>  'official',
                'time_in'   =>  '09:15am'
            ],
            [
                'name'  =>  'Secured Mantse',
                'visiting' =>  'Design Mantse',
                'purpose'   =>  'other',
                'time_in'   =>  '09:15am'
            ],
            [
                'name'  =>  'Black Sherif',
                'visiting' =>  'Brian Machiestay',
                'purpose'   =>  'official',
                'time_in'   =>  '09:15am'
            ],
            [
                'name'  =>  'Secured Mantse',
                'visiting' =>  'Design Mantse',
                'purpose'   =>  'personal',
                'time_in'   =>  '09:15am'
            ],
            [
                'name'  =>  'Sly Arthur',
                'visiting' =>  'Kelly Tranquillo',
                'purpose'   =>  'interview',
                'time_in'   =>  '09:15am'
            ],
        ],
            'keys'  => [
            [
                'staff' =>  'Joe Boateng',
                'department'    =>  'hr',
                'time in'   =>  '09:15am'
            ],
            [
                'staff' =>  'Mordecai Abodiee',
                'department'    =>  'business',
                'time in'   =>  '09:15am'
            ],
            [
                'staff' =>  'Nancy Doe',
                'department'    =>  'audit',
                'time in'   =>  '09:15am'
            ],
            [
                'staff' =>  'David',
                'department'    =>  'sales',
                'time in'   =>  '09:15am'
            ],
            [
                'staff' =>  'Nancy Doe',
                'department'    =>  'audit',
                'time in'   =>  '09:15am'
            ],
            [
                'staff' =>  'David',
                'department'    =>  'sales',
                'time in'   =>  '09:15am'
            ],
            [
                'staff' =>  'Nancy Doe',
                'department'    =>  'audit',
                'time in'   =>  '09:15am'
            ],
            [
                'staff' =>  'David',
                'department'    =>  'sales',
                'time in'   =>  '09:15am'
            ],
        ]
    ]);
});

Route::get('records', function () {
    return view('records');
});

Route::get('settings', function () {
    return view('settings');
});

// Route::get('keys', function () {
//     return view('keys', [
        
//     ]);
// });

// Route::get('visitors', function () {
//     return view('visitors',    [

//     ]);
// });
