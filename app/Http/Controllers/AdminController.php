<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\Tag;

use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{
    public function eventsPublisher(Request $r)
    {
        // получение всех мероприятий
        $now = date('Y-m-d');
        $events = Event::where('begin', '>=', $now)->orderBy('begin')->get();
        // dd($events);

        // передача всех мероприятий в представление
        return view('adminEventsPublisher', ['events' => $events]);
    }

    public function eventUpdate(Request $r, $id) {

        $event = Event::find($id);
        $tags = Tag::all();

        // передача всех мероприятий в представление
        return view('adminEventUpdate', [
            'event' => $event,
            'tags' => $tags,
        ]);

    }
}
