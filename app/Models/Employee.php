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


    public function visitors()
    {
        return $this->hasMany(Visitor::class, 'employee_Id', 'id');
    }

    
    public function ownDevice(){
        return $this->hasMany(Device::class);
    }

    public function key(){
        return $this->hasMany(KeyEvent::class, 'picked_by');
    }


}
