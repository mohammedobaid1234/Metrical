<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'country',
        'city',
        'mobile_number',
        'password',
        'first_name',
        'last_name',
        'country',
        'city',
        'mobile_number',
        'image_url',
        'type',
        'status',
        'code',
        'email_verified_at',
        'nationality',
        'id_number'
    ];


    protected $hidden = [
        'password',
        'remember_token',
        'code'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tenant()
    {
        return $this->hasOne(Tenant::class, 'user_id');
    }
    public function owner()
    {
        return $this->hasOne(Owner::class, 'user_id');
    }
    public function events()
    {
        return $this->belongsToMany(Event::class , 'interested_users');
    }

    static $term = "Contrary to popular belief, Lorem Ipsum is
    not simply random text. It has roots in a
    piece of classical Latin literature from 45
    BC, making it over 2000 years old. Richard
    McClintock, a Latin professor at HampdenSydney College in Virginia, looked up one of
    the more obscure Latin words, consectetur,
    from a Lorem Ipsum passage, and going
    through the cites of the word in classical
    literature, discovered the undoubtable 
    source. Lorem Ipsum comes from sections
    1.10.32 and 1.10.33 of “de Finibus Bonorum 
    et Malorum” (The Extremes of Good and
    Evil) by Cicero, written in 45 BC. This book is
    a treatise on the theory of ethics, very
    popular during the Renaissance. The first
    line of Lorem Ipsum, “Lorem ipsum dolor sit
    amet..”, comes from a line in section 1.10.32.
    The standard chunk of Lorem Ipsum used
    since the 1500s is reproduced below for
    those interested. Sections 1.10.32 and
    1.10.33 from “de Finibus Bonorum et
    Malorum” by Cicero are also reproduced in
    their exact original form, accompanied by
    English versions from the 1914 translation
    by H. Rackham.
    Contrary to popular belief, Lorem Ipsum is
    not simply random text. It has roots in a
    piece of classical Latin literature from 45
    BC, making it over 2000 years old. Richard
    McClintock, a Latin professor at Hampden";
}
