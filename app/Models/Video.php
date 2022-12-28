<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsTo(User::class);
    }

     // Relacion polimorfica uno a mucho 
     public function comments()
     {
         return $this->morphMany(Comment::class, 'commentable');
     }

    // Relación polimorfica muchos a muchos
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
