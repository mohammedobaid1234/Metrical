<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = ['full_name', 'email', 'mobile', 'passport_copy', 'title_dead_copy', 'emirate_id', 'sale_price', 'rent_price', 'rent_start_date', 'rent_end_date', 'type', 'property_id', 'user_id'];

    use HasFactory;
    public function property()
    {
        return  $this->belongsTo(Property::class, 'property_id', 'id');
    }
    public function user()
    {
        return  $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function stopoffer()
    {
        return  $this->hasOne(Stopoffer::class, 'offer_id', 'id');
    }
}
