<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $fillable = [
        "ainu01_enable",
        "ainu02_enable",
        "ainu01_access_date",
        "ainu01_total_quiz_point",
        "ainu01_practice_count",
        "ainu01_cognomen",
        "ainu02_total_quiz_point",
        "ainu02_practice_count",
        "ainu02_cognomen"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
