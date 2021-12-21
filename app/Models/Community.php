<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    use HasFactory;
    protected $fillable = ['name_ar', 'name_en', 'name_gr', 'area', 'location_longitude', 'location_latitude', 'image', 'status', 'readness_percentage'];

    public function properties()
    {
        return $this->hasMany(Property::class, 'community_id', 'id');
    }

    public function owner()
    {
        return $this->hasMany(Owner::class, 'community_id', 'id');
    }

    public function tenant()
    {
        return $this->hasMany(Tenant::class, 'community_id', 'id');
    }

    public function news()
    {
        return $this->hasMany(News::class, 'community_id', 'id');
    }

    public function event()
    {
        return $this->hasMany(Event::class, 'community_id', 'id');
    }
    /* public function scopeData($query)
    {
        $query->select(['name_' . app()->getLocale() . ' as name', 'area', 'location_longitude', 'location_latitude', 'address', 'image', 'status']);
    }*/

    public function toArray()
    {

        $name = 'name_' . strval($this->name . app()->getLocale());
        return [
            'id' => $this->id,
            'name_en' => $this->name_en,

            'name' => $this->$name,
            'area' => $this->area,
            'location_longitude' => $this->location_longitude,
            'location_latitude' => $this->location_latitude,
            'address' => $this->address,
            'image' => $this->image,
            'status' => $this->status,
            'villas_count' => $this->properties()->count(),
            'gates_count' => $this->properties()->count(),
            'properties' => $this->properties,
        ];
    }
}
