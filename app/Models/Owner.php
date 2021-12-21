<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'community_id',
        'passport_copy',
        'title_dead_copy',
        'emirate_id',
        'unit_number',
        'renting_price',
        'direct',
        'full_name',
        'email',
        'mobile'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function property()
    {
        return $this->hasMany(Property::class, 'owner_id', 'id');
    }
}
