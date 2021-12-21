<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_ar',
        'title_en',
        'title_gr',
        'description_ar',
        'description_en',
        'description_gr',
        'address', 'start_date', 'end_date', 'community_id'
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
            'id' => $this->id,
            'title' => $this->$title,
            'description' => $this->$description,
            'address' => $this->address,
            'community_id' => $this->community_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'community_id' => $this->community_id,
            'community' => $this->community
        ];
    }
    public function users()
    {
        return $this->belongsToMany(User::class , 'interested_users');
    }
}