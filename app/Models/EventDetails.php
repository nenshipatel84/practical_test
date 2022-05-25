<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'event_id',
        'frequency',
        'week_days',
        'qty',
        'months'
    ];
}
