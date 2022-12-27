<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Profile;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relacion uno a uno para que cuando consultemos los datos de un usuario tambien tengamos acceso a los datos de su perfil   
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    // Relacion uno a muchos 
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    //Relationship one to many
    public function videos()
    {
        return $this->hasMany(Video::class);
    } 

    // Relationship many to many
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    // Relacion polimorfica con la tabla images
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    
}
