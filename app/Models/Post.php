<?php

namespace App\Models;

use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    
    // relacion uno a muchos (inversa) 
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    // relacion uno a uno polimorfica
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
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
