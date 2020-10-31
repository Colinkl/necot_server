<?php

namespace App\Http\Controllers\API\v1;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    /**
     * GET http://site.local/api/v1/events
     *
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $limit = $request->input('limit') ?? Event::LIMIT;
        return Event::getLast($limit);
    }

    /**
     * GET http://site.local/api/v1/events/{event}
     * @param Event $event
     * @return Event
     */
    public function show(Event $event)
    {
        $event->types;
        $event->focuses;
        $event->profiles;

        return $event;
    }
}
