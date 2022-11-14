<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use App\Models\EventTag;
use App\Models\Event;
use App\Models\Tag;

class ApiController extends Controller
{
    public function addEvent(Request $r)
    {
        // return $r->all();

        // подготовка даты для валидации
        $date_after = strtotime('-1 days');
        $date_after = date('Y-m-d', $date_after);

        // проверяемые поля
        $inputs = $r->all();

        // правила проверки
        $rules = [
            'title' => 'required|min:5',
            'tags' => 'array',
            'url' => 'required|url|unique:events,url',
            'date' => "required|date|after:now-1day",
            'time' => 'required|',
            'price' => 'accepted_if:participation,money',
            'email' => 'exclude_without:notification|email:rfc,dns',
        ];

        // корректировка сообщений
        $messages = [
            'required' => 'Поле обязательно для заполнения',
            'accepted_if' => 'Поле обязательно для заполнения',
            'unique' => 'Данный адрес уже используется',
            'after' => 'Дата не может быть в прошлом',
            'integer' => 'Поле должно быть натуральным числом',
            'min' => 'Поле должно содержать больше :min символов',
            'url' => 'Поле должно содержать действующий URL',
            'email' => 'Адрес электронной почты указан не верно',
        ];

        // валидация
        $validator = Validator::make($inputs, $rules, $messages);

        // если есть ошибки валидации
        if ($validator->fails()) {
            return response()->json(['invalid' => $validator->errors()], 200);
        }

        // подготовка значений, относящихся к форме участия
        $participation = $r->participation;
        $price = null;

        if ($participation == 'free') {
            $participation = 'Бесплатно';
        } elseif ($participation == 'donate') {
            $participation = 'Донат';
        } elseif ($participation == 'money') {
            $price = $r->price;
            $participation = $price . ' руб.';
        }

        // подготовка временной метки
        $begin = $r->date . ' ' . $r->time;

        // подготовка даты
        $monts = [
            '01' => 'января',
            '02' => 'февраля',
            '03' => 'марта',
            '04' => 'апреля',
            '05' => 'мая',
            '06' => 'июня',
            '07' => 'июля',
            '08' => 'августа',
            '09' => 'сентября',
            '10' => 'октября',
            '11' => 'ноября',
            '12' => 'декабря',
        ];

        $start = explode(' ', $r->date);
        $date = $start[0];
        $date = explode('-', $date);
        $date = $date[2] . ' ' . $monts[$date[1]];

        // подготовка времени
        $time = $r->time;
        $time = explode(':', $time);
        $time = $time[0] . ':' . $time[1];

        // добавление записи о новом мероприятии
        $event = Event::create([
            'title' => $r->title,
            'url' => $r->url,
            'logo' => 'some.jpg',
            'participation' => $participation,
            'price' => $price,
            'begin' => $begin,
            'date' => $date,
            'time' => $time,
            'status' => '0',
        ]);

        // return $event;

        // добавление связи, если запрос содержит теги
        if ($r->tags) {

            foreach ($r->tags as $tag) {

                // получение идентификаторов каждого тега
                $tag_id = Tag::select('id')->where('alias', $tag)->get()[0]->id;
                // получение идентификатора мероприятия
                $event_id = $event->id;

                // return $tag_id;
                // return $event_id;

                // добавление записи о связи мероприятия с тегом
                $eventTag = EventTag::create([
                    'event_id' => $event_id,
                    'tag_id' => $tag_id,
                ]);

                // return $eventTag;
            }
        }

        // ответ после успешного завершения работы кода
        return response()->json([
            'status' => 'added',
            'message' => 'Мы получили информацию о мероприятии и скоро его опубликуем!',
            'link' => 'https://pestov.ru/alias-fugiat-eaque-rerum-quo-voluptatum-blanditiis.html',
        ], 200);
    }
}
