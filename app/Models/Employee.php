<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    protected $table = 'employees';
    protected $guarded = [];
    use HasFactory;


    public function department(){
        return $this->belongsTo(Department::class);
    }


}
