<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;

    public function tenet()
    {
        return $this->belongsTo(Tenant::class, 'tenant_id'); 
    }
    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id'); 
    }

    
}
