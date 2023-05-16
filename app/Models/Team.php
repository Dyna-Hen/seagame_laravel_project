<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'member',
        'created_by',
    ];

    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_teams')->withTimestamps();
    }

       // ===================FUNCTION TO CREATE & UPDATE===================================

       public static function store($request,$id=null){
        $team = $request->only(['name','member','created_by']);
        $team = self::updateOrCreate(['id'=>$id],$team);
        return $team;
    }

    // Relation with user =============================================
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relation with event =============================================
    public function event(): BelongsToMany
    {
        return $this->belongsToMany(Event::class);
    }
}
