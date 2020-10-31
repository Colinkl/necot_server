<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    const LIMIT = 10;

    protected $fillable = [
        'title',
        'avatar',
        'description',
        'content',
        'creator_id',
    ];

    /**
     * @param int $limit
     * @return mixed
     */
    public static function getLast($limit = self::LIMIT)
    {
        return Diary::paginate($limit);
    }
}
