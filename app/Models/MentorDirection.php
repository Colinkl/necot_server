<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MentorDirection extends Model
{
    protected $fillable = [
        'title',
        'mentor_id'
    ];
}
