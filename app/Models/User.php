<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // ===================FUNCTION TO CREATE & UPDATE===================================

    public static function store($request,$id=null){
        $user = $request->only(['name','email','password']);
        $user['password'] = Hash::make($user['password']);
        $user = self::updateOrCreate(['id'=>$id],$user);
        return $user;
    }

    // Relationship with event ========================================
    public function events():HasMany{
        return $this->hasMany(Event::class);
    }

    // Relationship with team ========================================
    public function teams():HasMany{
        return $this->hasMany(Team::class);
    }

    // Relationship with ticket ========================================
    public function tickets():HasOne{
        return $this->hasOne(Ticket::class);
    }
}
