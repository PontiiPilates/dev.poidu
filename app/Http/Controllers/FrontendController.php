<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Tag;

class FrontendController extends Controller
{
    public function general(Request $r)
    {
        // данные для вывода всех мероприятий (поумолчанию)
        $events = Event::where('begin', '>=', date('Y-m-d H:i:s'))->orderBy('begin')->where('status', 1)->get();
        // данные для вывода всех тегов (поумолчанию)
        $tags = Tag::all();

        // для вкладки "сегодня"
        $now = date('Y-m-d H:i:s');
        $day_end = date('Y-m-d 23:59:59');
        $e_today = Event::whereBetween('begin', [$now, $day_end])->orderBy('begin')->where('status', 1)->get();
        // dd($e_today);

        // для вкладки "завтра"
        $day_before = strtotime('+1 days');
        $day_before_start = date('Y-m-d 00:00:00', $day_before);
        $day_before_end = date('Y-m-d 23:59:59', $day_before);
        $e_tomorrow = Event::whereBetween('begin', [$day_before_start, $day_before_end])->orderBy('begin')->where('status', 1)->get();

        // для вкладки "выходные"
        $saturday = '2022-11-26 00:00:00';
        $sunday = '2022-11-27 23:59:59';
        $e_weeckend = Event::whereBetween('begin', [$saturday, $sunday])->orderBy('begin')->where('status', 1)->get();

        // для вкладки "с детьми"
        $e_child = Tag::find(6);
        // получение связанных с тегом мероприятий
        $e_child = $e_child->events;
        // сортировка коллекции мероприятий по помлю мероприятия "begin"
        $e_child = $e_child->sortBy('begin')->where('status', 1);
        // обновление ключей коллекции
        $e_child = $e_child->values()->all();

        // переменные должны быть определены
        $e_tags = '';
        $active_tag = '';
        // вывод мероприятий по тегу
        if ($r->has('tag')) {
            // получение тега
            $tag = Tag::find($r->tag);
            // получение связанных с тегом мероприятий
            $e_tags = $tag->events;
            // сортировка коллекции мероприятий по помлю мероприятия "begin"
            $e_tags = $e_tags->sortBy('begin')->where('begin', '>=', date('Y-m-d H:i:s'))->where('status', 1);
            // обновление ключей коллекции
            $e_tags = $e_tags->values()->all();
            // получение имени тега
            $active_tag = $tag->name;
        }

        // для вкладки "бесплатные"
        $e_free = Event::where('begin', '>=', date('Y-m-d H:i:s'))->orderBy('begin')->where('participation', 'Бесплатно')->where('status', 1)->get();

        return view('template', [
            'events' => $events,
            'e_today' => $e_today,
            'e_tomorrow' => $e_tomorrow,
            'e_weeckend' => $e_weeckend,
            'e_child' => $e_child,
            'e_tags' => $e_tags,
            'e_free' => $e_free,
            'tags' => $tags,
            'active_tag' => $active_tag,
        ]);
    }
}
