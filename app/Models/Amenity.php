<?php

namespace App\Models;

use GuzzleHttp\Handler\Proxy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    use HasFactory;
    public function property()
    {
        return $this->belongsToMany(Property::class, 'amenities_properties', 'amenity_id', 'property_id');
    }
}
