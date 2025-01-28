<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KeyEvent extends Model
{

    protected $table = 'key_events';
    protected $guarded = [];
    use HasFactory;


    public function pickedByEmployee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'picked_by');
    }

    public function returnedByEmployee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'returned_by');
    }
}
