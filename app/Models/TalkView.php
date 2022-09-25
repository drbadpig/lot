<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TalkView extends Model
{
    use HasFactory;

    protected $fillable = [
        'talk_id',
        'user_id',
    ];
}
