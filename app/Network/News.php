<?php

namespace App\Network;

use PHPHtmlParser\Dom;
use Illuminate\Support\Facades\Http;

class News
{
    /**
     * @param int $page
     */
    public static function get($page = 1)
    {
        $f = 1 + ($page - 1) * 9;
        $newsList = [];

        $dom = new Dom;
        $response = Http::get("https://admtyumen.ru/ogv_ru/society/talented_children/news.htm?f=$f&fid=0&blk=11595307")->getBody()->getContents();
        $dom->loadStr($response);

        $contents = $dom->find('.news-item');

        if(!$contents) return null;

        foreach ($contents as $content) {
            $newsItem = [];

            $newsItem["title"] = $content->find('.title')->innerHtml;
            $newsItem["link"] = "https://admtyumen.ru/".$content->find('a')->getAttribute('href');
            $str = str_replace(")", "", $content->find('.image-holder')->getAttribute('style'));
            $str = str_replace("background-image:url(", "", $str);
            $newsItem["avatar"] = "https://admtyumen.ru/".$str;
            $newsItem["date"] = $content->find('.date')->innerHtml;

            $newsList[] = $newsItem;
        }

        return $newsList;

    }
}
