<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    protected $table = TBL_CHARACTER;

    protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'nickname',
        'bio',
        'avatar',
        'gender',
        'dob',
        'address',
        'level',
        'year',
        'intelligence',
        'strength',
        'vitality',
        'dexterity',
        'exp_per_second',
        'gold_per_second',
        'bonus_exp',
        'bonus_gold',
        'life_steal',
        'armor_break',
        'critical_rate',
        'critical_damage',
        'last_login',
        'last_logout',
        'agent',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
