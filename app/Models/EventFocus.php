<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventFocus extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'title',
        'event_id'
    ];

    protected $table = 'event_focuses';
}
