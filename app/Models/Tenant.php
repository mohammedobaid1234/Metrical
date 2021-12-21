<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'community_id',
        'passport_copy',
        'visa_copy',
        'unit_number',
        'full_name',
        'email',
        'mobile'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function rent()
    {
        return $this->hasMany(Rent::class, 'tenant_id', 'id');
    }
}