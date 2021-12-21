<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterestedUser extends Model
{
    use HasFactory;
    protected $primaryKey = ['user_id', 'event_id'];
    public $incrementing = false;
    
   protected $fillable = [
        'user_id', 'event_id','status'
   ];


}
