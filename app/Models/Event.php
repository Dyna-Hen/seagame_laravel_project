<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date',
        'description',
        'created_by',
    ];

  
    ///add
    public function teams()
    {
        return $this->belongsToMany(Team::class, 'event_teams')->withTimestamps();
    }


    // ===================FUNCTION TO CREATE & UPDATE===================================

    public static function store($request,$id=null){
        $event = $request->only(['name','date','description','created_by']);
        $event = self::updateOrCreate(['id'=>$id],$event);
        //add
        $teams = request('teams');
        $event->teams()->sync($teams);
        //
        return $event;
    }

    // Relation with user =============================================
     public function user(): BelongsTo
     {
         return $this->belongsTo(User::class);
     }

    // Relation with team =============================================
    public function team(): BelongsToMany
    {
        return $this->belongsToMany(Team::class);
    }

    // Relationship with ticket ========================================
    public function tickets():HasMany{
        return $this->hasMany(Ticket::class);
    }

    


}
