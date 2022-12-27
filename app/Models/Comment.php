<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function commentable()
    {
        return $this->morphTo();
    }

    // Relación una a muchos iversa con la tabla usarios
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
