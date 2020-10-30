<?php

namespace App\Models;

use App\Models\EventFocus;
use App\Models\EventProfile;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    const LIMIT = 10;

    public $timestamps = false;

    protected $fillable = [
        'title',
        'avatar',
        'link',
        'date_start',
        'date_end',
        'location',
        'form_of_conducting',
        'event_type',
        'event_level',
        'participant_category',
        'organizer',
        'curator'
    ];

    /**
     * @param int $limit
     * @return mixed
     */
    public static function getLast($limit = self::LIMIT)
    {
        return self::paginate($limit);
    }

    /**
     * @param $attributes
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    public static function create($attributes)
    {
        $createdEvent = (new static)->newQuery()->create($attributes);

        foreach ($attributes['focuses'] as $focus)
        {
            EventFocus::create([
                'title' => $focus,
                'event_id' => $createdEvent['id']
            ]);
        }

        foreach ($attributes['profiles'] as $profile)
        {
            EventProfile::create([
                'title' => $profile,
                'event_id' => $createdEvent['id']
            ]);
        }

        return $createdEvent;
    }
}
