<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $fillable = [
        'title_ar',
        'title_en',
        'title_gr',
        'description_ar',
        'description_en',
        'description_gr',
        'image_url', 'images', 'community_id'
    ];
    public function community()
    {
        return $this->belongsTo(Community::class, 'community_id', 'id');
    }


    public function toArray()
    {

        $title = 'title_' . strval($this->name . app()->getLocale());
        $description = 'description_' . strval($this->name . app()->getLocale());

        return [
            'community_id' => $this->community_id,

            'title_ar' => $this->title_ar,
            'title_en' => $this->title_en,
            'title_gr' => $this->title_gr,
            'description_ar' => $this->description_ar,
            'description_en' => $this->description_en,
            'description_gr' => $this->description_gr,
            'main_image' => $this->image_url,
            'images' => $this->images,
            'community' => $this->community,
            'description' => $this->$description,
            'title' => $this->$title,

        ];
    }

    protected $casts = [
        'images' => 'array',
    ];
}