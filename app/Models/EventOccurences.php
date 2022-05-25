<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventOccurences extends Model
{
    use HasFactory;
    protected $fillable = [
        'event_id',
        'event_details_id'
    ];
}
