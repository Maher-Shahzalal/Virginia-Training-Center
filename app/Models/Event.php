<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = "events";

    protected $fillable = [
        'event_title',
        'event_description',
        'event_date',
        'image',
    ];
}
