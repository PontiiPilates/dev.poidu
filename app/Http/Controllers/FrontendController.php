<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Tag;


class FrontendController extends Controller
{
    public function general(Request $r)
    {

        // вывод всех мероприятий
        $events = Event::all();

        $tags = Tag::all();

        // вывод мероприятий по тегу
        if ($r->has('tag')) {
            $tag = Tag::find($r->tag);
            $events = $tag->events;
        }

        if ($r->isMethod('post')) {
            dd($r->all());
        }

        return view('template', [
            'events' => $events,
            'tags' => $tags,
        ]);
    }
}