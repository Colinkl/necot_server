<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    const LIMIT = 10;

    protected $fillable = [
        'title',
        'link',
        'avatar',
    ];

    /**
     * @param int $limit
     * @return mixed
     */
    public static function getLast($limit = self::LIMIT)
    {
        return self::paginate($limit)->toArray()['data'];
    }
}
