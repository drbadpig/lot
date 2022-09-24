<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'image',
    ];

    public function category_folder()
    {
        return $this->belongsTo(CategoryFolder::class);
    }

    public function talks()
    {
        return $this->hasMany(Talk::class);
    }


    public function getComments()
    {
        $array = DB::select('SELECT comments.id, comments.user_id, comments.text, comments.is_edited, comments.likes, comments.dislikes, comments.created_at, comments.updated_at, comments.deleted_at FROM comments
join (talks join categories cats on talks.category_id = cats.id )
	  on comments.talk_id = talks.id
      where category_id = '.$this->id);

        return new Collection($array);
    }
}
