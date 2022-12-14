<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Talk extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title',
        'text',
        'user_id',
        'category_id',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function talk_views()
    {
        return $this->hasMany(TalkView::class);
    }

    protected static function boot() {
        parent::boot();

        static::deleting(function($talk) {
            $talk->comments()->delete();
        });
    }
}
