<?php


namespace App\Mutations;

use Carbon\Carbon;

class DateMutation
{
    const DATES = [
        'января'    => 'January',
        'февраля'   => 'February',
        'марта'     => 'March',
        'апреля'    => 'April',
        'мая'       => 'May',
        'июня'      => 'June',
        'июля'      => 'July',
        'августа'   => 'August',
        'сентября'  => 'September',
        'октября'   => 'October',
        'ноября'    => 'November',
        'декабря'   => 'December'
    ];

    /**
     * Converts month names to English
     *
     * @param $time
     * @return string
     */
    public static function toEnglish($time)
    {
        $date = explode(' ', $time);
        list($day, $month, $years) = $date;
        $month = self::DATES[$month];

        return "$month $day, $years";
    }

    /**
     * Converts to unix time
     *
     * @param $time
     * @return float|int|string
     */
    public static function toUnix($time)
    {
        $time = self::toEnglish($time);
        $date = Carbon::create($time);

        return $date->timestamp;
    }
}
