<?php

namespace App\Models;

use App\Models\MentorDirection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property array $directions
 */
class Mentor extends Model
{
    use SoftDeletes;

    const LIMIT = 10;

    protected $fillable = [
        'first_name',
        'last_name',
        'description',
        'avatar',
        'telegram_link',
        'vk_link',
        'whatsapp_link',
        'email'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function directions()
    {
        return $this->hasMany(MentorDirection::class);
    }

    /**
     * @param int $limit
     * @return mixed
     */
    public static function getLast($limit = self::LIMIT)
    {
        return self::with('directions')->paginate($limit)->toArray()['data'];
    }

    /**
     * @param $attributes
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    public static function create($attributes)
    {
        $createdMentor = (new static)->newQuery()->create($attributes);

        if(isset($attributes['directions']))
        {
            foreach($attributes['directions'] as $direction)
            {
                MentorDirection::create([
                    'title' => $direction,
                    'mentor_id' => $createdMentor['id']
                ]);
            }
        }

        return $createdMentor;
    }
}
