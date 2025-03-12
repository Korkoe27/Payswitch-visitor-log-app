<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Activities extends Model
{
    use HasFactory;

    protected $table = 'activities';
    protected $guarded = [];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public static function log($action){
        return self::create([
            'user_id' => auth()->id(),
            'action'=>$action,
        ]);
    }
}
