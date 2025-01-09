<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{

    protected $table = 'departments';
    
    protected $guarded = [];
    use HasFactory;


    public function employees(){
        return $this->hasMany(Employee::class);
    }
}
