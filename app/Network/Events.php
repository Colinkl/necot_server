<?php

namespace App\Network;

use PHPHtmlParser\Dom;
use Illuminate\Support\Facades\Http;

class Events
{
    /**
     * @param int $page
     */
    public static function get()
    {
        $contents = file_get_contents("https://edo.72to.ru/genius/dict/events_list/?realization_form=");
        $contents =  json_decode($contents, true);

        if(!$contents) return null;

        $idList = [];
        $eventList = [];

        foreach ($contents["data"] as $content) {
            $idList[] = $content["id"];
        }

        foreach ($idList as $eventID) {
            $eventItem = json_decode(file_get_contents("https://edo.72to.ru/genius/events/$eventID/data"), true)['data'];
            $eventListItem = [];

            $eventListItem["title"] = $eventItem['name'];
            $eventListItem["link"] = "https://edo.72to.ru/genius/events/$eventID";
            $eventListItem["avatar"] = $eventItem['cover'];
            $eventListItem["date_start"] = $eventItem['date_begin'];
            $eventListItem["date_end"] = $eventItem['date_end'];
            $eventListItem["location"] = $eventItem['place'];
            $eventListItem["focuses"] = $eventItem['direction_gifted'];
            $eventListItem["profiles"] = $eventItem['kind_direction_gifted'];
            $eventListItem["form_of_conducting"] = $eventItem['realization_form'];
            $eventListItem["event_type"] = $eventItem['kind'];
            $eventListItem["event_level"] = $eventItem['level'];
            $eventListItem["participant_category"] = $eventItem['participants_category'];
            $eventListItem["organizer"] = $eventItem['unit_organizer'];
            $eventListItem["curator"] = $eventItem['curator'];

            $eventList[] = $eventListItem;
        }
        return $eventList;
    }
}

