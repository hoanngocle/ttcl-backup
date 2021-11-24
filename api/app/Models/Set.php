<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Set extends Model
{
    use HasFactory;

    protected $table = TBL_SET;

    protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'course_id',
        'name',
        'gold',
        'exp',
        'item_type',
        'item_amount',
        'waifu_id',
        'waifu_fragment_amount',
        'created_by',
    ];
}
