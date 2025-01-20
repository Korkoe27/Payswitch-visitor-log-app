<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{

    protected $table = 'visitor';

    protected $guarded = [];
    use HasFactory;


    // public function setDevicesAttribute($value)
    // {
    //     $this->attributes['devices'] = json_encode(is_array($value) ? $value : [$value]);
    // }

    // /**
    //  * Mutator to ensure dependents are stored as JSON.
    //  */
    // public function setDependentsAttribute($value)
    // {
    //     $this->attributes['dependents'] = json_encode(is_array($value) ? $value : [$value]);
    // }


    public function visitee()
    {
        return $this->belongsTo(Employee::class, 'employee_Id', 'id');
    }

    protected $casts = [
        'devices' => 'array',
        'dependents' => 'array'// Automatically cast the JSON column to an array
    ];
}


