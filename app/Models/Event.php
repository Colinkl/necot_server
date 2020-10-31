<?php

namespace App\Models;

use App\Models\EventType;
use App\Models\EventFocus;
use App\Models\EventProfile;
use Illuminate\Database\Eloquent\Model;

/**
 * @property array $types
 * @property array $focuses
 * @property array $profiles
 */
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
        'event_level',
        'participant_category',
        'organizer',
        'curator'
    ];

    public function types()
    {
        return $this->hasMany(EventType::class);
    }

    public function focuses()
    {
        return $this->hasMany(EventFocus::class);
    }

    public function profiles()
    {
        return $this->hasMany(EventProfile::class);
    }

    /**
     * @param int $limit
     * @return mixed
     */
    public static function getLast($limit = self::LIMIT)
    {
        return self::with('types')->
                     with('focuses')->
                     with('profiles')->
                     paginate($limit);
    }

    /**
     * @param $attributes
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    public static function create($attributes)
    {
        $createdEvent = (new static)->newQuery()->create($attributes);

        if($attributes['focuses'])
        {
            foreach ($attributes['focuses'] as $focus)
            {
                if(!$focus) continue;

                EventFocus::create([
                    'title' => $focus,
                    'event_id' => $createdEvent['id']
                ]);
            }
        }

        if($attributes['profiles'])
        {
            foreach ($attributes['profiles'] as $profile)
            {
                if(!$profile) continue;

                EventProfile::create([
                    'title' => $profile,
                    'event_id' => $createdEvent['id']
                ]);
            }
        }

        if($attributes['event_type'])
        {
            foreach ($attributes['event_type'] as $eventType)
            {
                if(!$eventType) continue;

                EventType::create([
                    'title' => $eventType,
                    'event_id' => $createdEvent['id']
                ]);
            }
        }

        return $createdEvent;
    }
}
