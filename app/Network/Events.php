<?php

namespace App\Network;

use PHPHtmlParser\Dom;
use Illuminate\Support\Facades\Http;

class Events
{
    /**
     * @param int $page
     */
    public static function get($page = 1)
    {
        if ($page == 1) $f = ''; else $f = "?page=$page";
        $eventList = [];

        $dom = new Dom;
        $response = Http::get("https://edo.72to.ru/genius/events$f")->getBody()->getContents();
        var_dump($response);
        die();
        $dom->loadStr($response);

        $contents = $dom->find('.events-list-item');

        if(!$contents) return null;

        foreach ($contents as $content) {
            $eventItem = [];

            $eventItem["title"] = $content->find('.event-card__title')->find('a')->innerHtml;
            $eventItem["link"] = "https://edo.72to.ru/".$content->find('.event-card__title')->find('a')->getAttribute('href');
            $eventItem["avatar"] = "https://admtyumen.ru/".$content->find('.event-cart__image')->getAttribute('src');

            $domEventItem = new Dom;
            $response = Http::get($eventItem["link"])->getBody()->getContents();
            $domEventItem->loadStr($response);

            $eventItem["date_start"] = str_replace("Дата начала: ", "", $domEventItem->find('.vue-model__short-info-item')->innerHtml[0]);
            $eventItem["date_end"] = str_replace("Дата окончания: ", "", $domEventItem->find('.vue-model__short-info-item')->innerHtml[1]);
            $eventItem["location"] = str_replace("Место проведения: ", "", $domEventItem->find('.vue-model__short-info-item')->innerHtml[2]);
            $domEventItem->find('.vue-model-description__aside-items');
            $eventItem["focuses"] = is_array($domEventItem[0]->find('.vue-model-description__aside-list-item')) ? $domEventItem[0]->find('.vue-model-description__aside-list-item') : [$domEventItem[0]->find('.vue-model-description__aside-list-item')];
            $eventItem["profiles"] = is_array($domEventItem[1]->find('.vue-model-description__aside-list-item')) ? $domEventItem[1]->find('.vue-model-description__aside-list-item') : [$domEventItem[1]->find('.vue-model-description__aside-list-item')];
            $eventItem["form_of_conducting"] = $domEventItem[2]->find('.vue-model-description__aside-list-item');
            $eventItem["event_type"] = $domEventItem[3]->find('.vue-model-description__aside-list-item');
            $eventItem["event_level"] = $domEventItem[4]->find('.vue-model-description__aside-list-item');
            $eventItem["participant_category"] = $domEventItem[5]->find('.vue-model-description__aside-list-item');
            $eventItem["organizer"] = $domEventItem[6]->find('.vue-model-description__aside-list-item');
            $eventItem["curator"] = $domEventItem[7]->find('.vue-model-description__aside-list-item');

            $eventList[] = $eventItem;
        }

        return $eventList;

    }
}

