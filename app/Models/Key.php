<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Key extends Model
{

    
    protected $table = 'keys';
    protected $guarded = [];
    use HasFactory;


    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function pickedByEmployee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'picked_by');
    }

    public function returnedByEmployee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'returned_by');
    }
}
