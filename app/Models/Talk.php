<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Talk extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'text',
        'user_id',
        'category_id',
        'likes',
        'dislikes',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
