<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function users(){
        return $this->belongsToMany(User::class,'permissions')->withPivot( 'view','create', 'modify', 'delete');
    }
    
}
