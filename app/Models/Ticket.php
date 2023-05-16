<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'event_id',
        'date',
    ];

    // ===================FUNCTION TO CREATE & UPDATE===================================

    public static function store($request,$id=null){
        $ticket = $request->only(['user_id','event_id','date']);
        $ticket = self::updateOrCreate(['id'=>$id],$ticket);
        return $ticket;
    }


    // Back relation ticket to user=============================================
     public function user(): BelongsTo
     {
         return $this->belongsTo(User::class);
     }

     public function event(): BelongsTo
     {
         return $this->belongsTo(Event::class);
     }
}
