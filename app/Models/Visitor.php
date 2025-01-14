<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{

    protected $table = 'visitor';

    protected $guarded = [];
    use HasFactory;




    public function visitee()
    {
        return $this->belongsTo(Employee::class, 'employee_Id', 'id');
    }

    protected $casts = [
        'devices' => 'array', // Automatically cast the JSON column to an array
    ];
}


