<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Property extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_ar',
        'name_en',
        'name_gr',
        'area',
        'reference',
        'feminizations',
        'is_shortterm',
        'bedroom',
        'bathroom',
        'gate',
        'date_added',
        'address_ar',
        'address_en',
        'address_gr',
        'description_ar',
        'description_ar',
        'description_ar',
        'city',
        'location_latitude',
        'location_longitude',
        'image_url',
        'images',
        'type',
        'offer_type',
        'status',
        'community_id',
        'owner_id',
        'amenities',
        



    ];

    protected $casts = ['amenities' => 'json', 'images' => 'json'];
    /**
     * 
     * Relations &_&
     */
    public function community()
    {
        return $this->belongsTo(Community::class, 'community_id', 'id');
    }
    public function rent()
    {
        return $this->hasMany(Rent::class, 'property_id', 'id');
    }
    public function amenity()
    {
        return $this->belongsToMany(Amenity::class, 'amenities_properties ', 'property_id', 'amenity_id');
    }

    public function offer()
    {
        return $this->hasMany(Offer::class, 'property_id', 'id');
    }
    public function owner()
    {
        return $this->belongsTo(Owner::class, 'owner_id', 'id');
    }

    /**
     * 
     * 
     * Functions For Program
     */
    public function scopePercentage()
    {
        $rentedNow = $this->whereHas('rent')->count();
        $total = $this->count();
        if ($rentedNow != 0) {
            $per = $rentedNow  / $total * 100;
        }

        return $per  ??  0;
    }

    public function toArray()
    {
        $name = 'name_' . strval($this->name . app()->getLocale());
        $description = 'description_' . strval($this->name . app()->getLocale());

        $rentNow = Rent::where('id', $this->id)->exists();
        return [
            'id' => $this->id,
            'name' => $this->$name,
            'description' => $this->$description,
            'area' => $this->area,
            'reference' => $this->reference,
            'feminizations' => $this->feminizations,
            'type' => $this->type,
            'offer_type' => $this->offer_type,
            'is_shortterm' => $this->is_shortterm,
            'bedroom' => $this->bedroom,
            'bathroom' => $this->bathroom,
            'date_added' => $this->date_added,
            'address' => $this->address,
            'status' => $this->status,
            'location_longitude' => $this->location_longitude,
            'location_latitude' => $this->location_latitude,
            'amenities' => $this->amenities,
            'price' => $this->price,
            'gate' => $this->gate,
            'community_id' => $this->community_id,
            'owner_id' => $this->owner_id,
            'city' => $this->city,
            'rent_now' => $rentNow,
            'current_rent' => $rentNow ? Rent::where('id', $this->id)->get() : false,
            'offer' => Offer::whereHas('property', function ($query) {
                $query->where('owner_id', $this->owner_id);
            })->get(),
        ];
    }
}
