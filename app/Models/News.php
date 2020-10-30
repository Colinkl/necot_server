<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    const LIMIT = 10;

    public $timestamps = false;

    protected $fillable = [
        'title', 'avatar', 'link', 'date'
    ];

    /**
     * @param int $limit
     * @return mixed
     */
    public static function getLast($limit = self::LIMIT)
    {
        return News::paginate($limit);
    }
}
