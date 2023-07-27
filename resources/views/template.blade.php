<!doctype html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @php
    $v = 2;
    @endphp

    {{-- For SEO --}}
    <title>Poidu | Навигатор туриста</title>
    <meta name="description"
        content="Мы собрали все пешие походы, экскурсии и автобусные туры Красноярска на одной странице.">
    <meta name="keywords"
        content="походы, экскурсии, туризм, путешествия, столбы, торгашинский хребет, богунайский водопад, гремячая грива">
    {{-- End For SEO --}}

    {{-- Канонический адрес --}}
    <link rel="canonical" href="https://poidu.org/" />
    {{-- Канонический адрес --}}

    {{-- Add Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    {{-- End Add Bootstrap --}}

    {{-- Add Slick--}}
    <link rel="stylesheet" type="text/css" href="/storage/vendor/slick/slick.css?v<?=$v?>" />
    <link rel="stylesheet" type="text/css" href="/storage/vendor/slick/slick-theme.css?v<?=$v?>" />
    {{-- End Add Slick--}}

    {{-- Favicon --}}
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    {{-- End Favicon --}}

    {{-- Main CSS --}}
    <link rel="stylesheet" href="/storage/css/style.css?v<?=$v?>">
    {{-- End Main CSS --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();
        for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
        k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
    
        ym(91231794, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
        });
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/91231794" style="position:absolute; left:-9999px;" alt="" /></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->

</head>

<body>

    {{-- Promo --}}
    <div class="container text-center mt-3 mb-3">
        <a href="{{ route('events') }}" class="text-decoration-none">
            <h1 class="d-inline brand" style="font-size: 48px"><b>Poidu</b></h1>
        </a>
        <p class="m-0"><small><b>Агрегатор туристических мероприятий</b></small></p>
        <p class="m-0"><small>Знаете о мероприятии? Добавьте его бесплатно!</small></p>
    </div>
    {{-- End Promo --}}

    {{-- Navigation --}}
    <nav class="container mb-5">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a type="button" href="" class="nav-link active rounded-pill text-reset" data-bs-toggle="modal"
                    data-bs-target="#addEventModal">
                    <i class="bi bi-plus-circle-fill brand me-2" style="color: white;"></i>добавить</a>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('about') }}">О проекте</a>
            </li>
        </ul>
    </nav>
    {{-- End Navigation --}}



    {{-- Modal Add Event --}}
    <div class="modal fade" id="addEventModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-element" id="addEventModalForm">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Добавление мероприятия</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <div class="modal-body">

                    {{-- Message --}}
                    <div class="d-flex align-items-center mb-3">
                        <img src="favicon.svg" height="32" class="d-block" alt="">
                        <small class="d-block fs-12 ms-3">
                            Если Вы знаете о мероприятии или организуете его сами, то скорее поделитесь им.
                            {{-- Подробнее о правилах размещения --}}
                            {{-- <a href="/about#rules">здесь</a>. --}}
                        </small>
                    </div>
                    {{-- Message --}}

                    {{-- Форма --}}
                    <form name="formAddEvent" id="formAddEvent">
                        @csrf

                        {{-- Title --}}
                        <div class="mb-3">
                            <label for="title" class="col-form-label">Название: <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="title" name="title"
                                placeholder="Поход на Солбы">
                            <div id="titleInvalid" class="invalid-feedback"></div>
                        </div>
                        {{-- Title --}}

                        {{-- Tags --}}
                        @foreach($tags as $tag)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="{{ $tag->alias }}"
                                id="{{ $tag->alias }}" name="tags[]">
                            <label class="form-check-label link-primary" for="{{ $tag->alias }}">#{{ $tag->name
                                }}</label>
                        </div>
                        @endforeach
                        {{-- Tags --}}

                        {{-- URL --}}
                        <div class="mb-3">
                            <label for="url" class="col-form-label">Ссылка на источник: <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="url" name="url"
                                placeholder="https://source.some...">
                            <div id="urlInvalid" class="invalid-feedback"></div>
                        </div>
                        {{-- URL --}}

                        {{-- Дата и время --}}
                        <div class="row mb-3">
                            <div class="col">
                                <label for="date" class="col-form-label">Дата начала: <span
                                        class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="date" name="date"
                                    value="{{ date('Y-m-d') }}">
                                <div id="dateInvalid" class="invalid-feedback"></div>
                            </div>
                            <div class="col">
                                <label for="time" class="col-form-label">Время начала: <span
                                        class="text-danger">*</span></label>
                                <input type="time" class="form-control" id="time" name="time" value="{{ date('H:i') }}">
                                <div id="timeInvalid" class="invalid-feedback"></div>
                            </div>
                        </div>
                        {{-- Дата и время --}}

                        {{-- Форма участия --}}
                        <fieldset class="row mb-3">
                            <legend class="col-form-label pt-0">Участие: <span class="text-danger">*</span></legend>
                            <div class="d-flex">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" id="freeParticipation"
                                        name="participation" value="free" checked>
                                    <label class="form-check-label" for="freeParticipation">Бесплатно</label>
                                </div>
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" id="donateParticipation"
                                        name="participation" value="donate">
                                    <label class="form-check-label" for="donateParticipation">Донат</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="moneyParticipation"
                                        name="participation" value="money">
                                    <label class="form-check-label" for="moneyParticipation">Покупка</label>
                                </div>
                            </div>
                            <div class="mb-3" id="rowPrice">
                                <label for="price" class="col-form-label">Стоимость (руб.): <span
                                        class="text-danger">*</label>
                                <input type="number" class="form-control" id="price" name="price" placeholder="1200"
                                    value="dfdf">
                                <div id="priceInvalid" class="invalid-feedback"></div>
                            </div>
                        </fieldset>
                        {{-- Форма участия --}}

                        {{-- Notification --}}
                        <div class="form-check invisible">
                            <input class="form-check-input" type="checkbox" id="notification" name="notification"
                                value="true">
                            <label class="form-check-label" for="notification">Уведомить о добавлении</label>
                        </div>
                        <div class="mb-3" id="rowEmail">
                            <label for="email" class="col-form-label">Email: <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name="email">
                            <div id="emailInvalid" class="invalid-feedback"></div>

                        </div>
                        {{-- Notification --}}

                    </form>
                    {{-- Форма --}}

                </div>

                <div class="modal-footer justify-content-start">
                    <button type="button" class="btn btn-dark rounded-5" id="submitAddEvent">Добавить</button>
                    <button type="button" class="btn btn-light rounded-5" data-bs-dismiss="modal">Закрыть</button>
                    <button id="showAddEventMessage" type="hidden" class="btn btn-primary d-none"
                        data-bs-target="#addEventModalMessage" data-bs-toggle="modal">Открыть второе модальное
                        окно</button>
                </div>

            </div>

        </div>

    </div>
    {{-- Modal Add Event --}}

    {{-- Modal Add Event Message --}}
    <div class="modal fade" id="addEventModalMessage" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Добавление мероприятия</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <div class="modal-body">
                    <div id="messageAboutEvent" class="alert alert-success" role="alert"></div>
                    {{-- <p>Следить за статусом мероприятия можно по этой ссылке <a href="#" id="eventStatusLink"></a>
                    </p> --}}
                    {{-- <p>Подробнее ознакомиться с правилами публикации мероприятий можно <a href="/about#rules">здесь</a>.
                    </p> --}}
                </div>
                <div class="modal-footer justify-content-start">
                    <button type="button" class="btn btn-dark rounded-5" data-bs-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Add Event Message --}}

    @php
    $slides = [
        [
        'url' => 'https://vk.com/simsim24?w=wall-17606834_65889',
        'image' => '22-11-22-1.jpg',
        'title' => '"Губернские истории"',
        'description' => 'Экскурсия в п. Шила и п. Сухобузимо',
        'datetime' => '26 ноября в 10:00',
        'price' => '1 700 руб.',
        'die' => '2022-11-26 10:00',
        ],
        [
        'url' => 'https://vk.com/simsim24?w=wall-17606834_65888',
        'image' => '22-11-22-2.jpg',
        'title' => 'Катания на Хаски',
        'description' => 'Экскурсия',
        'datetime' => '27 ноября в 10:00',
        'price' => '1 800 руб.',
        'die' => '2022-11-27 10:00',
        ],
        [
        'url' => 'https://vk.com/@neposedy_travel-zimnyaya-skazka-na-altae',
        'image' => '22-11-22-3.jpg',
        'title' => 'Зимняя сказка на Алтае',
        'description' => 'Путешествие',
        'datetime' => '2 января в 04:00',
        'price' => '40 000 руб.',
        'die' => '2023-01-02 04:00',
        ],
    ];

    $now = date('Y-m-d H:i');
    @endphp

    {{-- Slick Mobile --}}
    <div class="container device slider-mobile p-0 mb-5 d-md-none">
        @foreach ($slides as $slide)
        @if($slide['die'] > $now)
        <div class="card rounded-element border-0 soft-shadow">
            <img src="public/images/slides/{{ $slide['image'] }}" class="card-img-top rounded-image">
            <div class="card-body">
                <a class="stretched-link text-reset text-decoration-none" href="{{ $slide['url'] }}" target="_blank">
                    <h6 class="card-title">{{ $slide['title'] }}</h6>
                </a>
                <p class="fs-14">{{ $slide['description'] }}</p>
                <div class="d-flex justify-content-between align-items-baseline"><small class="color-secondary">{{
                        $slide['datetime'] }}</small><span><b>{{ $slide['price'] }}</b></span></div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
    {{-- Slick Mobile --}}
    
    {{-- Slick Desctop --}}
    <div class="container device slider-desctop p-0 mb-5 d-none d-md-block">
        @foreach ($slides as $slide)
        @if($slide['die'] > $now)
        <div class="card rounded-element border-0 light-shadow" style="margin-left: 12px; margin-right: 12px;">
            <div class="bg-image rounded-image"
                style="height: 270px; background-image: url('public/images/slides/{{ $slide['image'] }}');"></div>
            <div class="card-body">
                <a class="stretched-link text-reset text-decoration-none" href="{{ $slide['url'] }}" target="_blank">
                    <h6 class="card-title">{{ $slide['title'] }}</h6>
                </a>
                <p class="fs-14">{{ $slide['description'] }}</p>
                <div class="d-flex justify-content-between align-items-baseline"><small class="color-secondary">{{
                        $slide['datetime'] }}</small><span><b>{{ $slide['price'] }}</b></span></div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
    {{-- Slick Desctop --}}

    {{-- Events --}}
    <div class="container device" id="tabs">

        {{-- Tabs --}}
        <ul class="nav nav-pills mb-4 flex-nowrap crop" id="pills-tab" role="tablist"
            style="margin-left: -12px; margin-right: -12px">
            <li class="nav-item" role="presentation">
                <button class="nav-link rounded-pill text-nowrap text-reset @if(empty($active_tag)) active @endif"
                    id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab"
                    aria-controls="pills-all" aria-selected="true" style="margin-left: 12px">Все</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link rounded-pill text-nowrap text-reset" id="pills-free-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-free" type="button" role="tab" aria-controls="pills-free"
                    aria-selected="false">Бесплатные</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link rounded-pill text-nowrap text-reset" id="pills-today-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-today" type="button" role="tab" aria-controls="pills-today"
                    aria-selected="true">Сегодня</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link rounded-pill text-nowrap text-reset" id="pills-tomorrow-tab"
                    data-bs-toggle="pill" data-bs-target="#pills-tomorrow" type="button" role="tab"
                    aria-controls="pills-tomorrow" aria-selected="false">Завтра</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link rounded-pill text-nowrap text-reset" id="pills-weeckend-tab"
                    data-bs-toggle="pill" data-bs-target="#pills-weeckend" type="button" role="tab"
                    aria-controls="pills-weeckend" aria-selected="false">Выходные</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link rounded-pill text-nowrap text-reset" id="pills-childs-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-childs" type="button" role="tab" aria-controls="pills-childs"
                    aria-selected="false" style="margin-right: 12px">С детьми</button>
            </li>
            @if(!empty($active_tag))
            <li class="nav-item" role="presentation">
                <button class="nav-link rounded-pill text-nowrap text-reset active" id="pills-tags-tab"
                    data-bs-toggle="pill" data-bs-target="#pills-tags" type="button" role="tab"
                    aria-controls="pills-tags" aria-selected="false" style="margin-right: 12px">#{{ $active_tag
                    }}</button>
            </li>
            @endif
        </ul>
        {{-- End Tabs --}}

        {{-- Tab Contents --}}
        <div class="tab-content" id="pills-tabContent">

            {{-- Все --}}
            <div class="tab-pane fade @if(empty($active_tag)) show active @endif" id="pills-all" role="tabpanel"
                aria-labelledby="pills-all-tab" tabindex="0" style="min-height: 100vh">
                @if ( empty($events[0]))
                <div class="card">
                    <div class="card-body">Таких мероприятий сейчас нет</div>
                </div>
                @endif
                @foreach($events as $event)
                <div class="card light-shadow border-0 rounded-element mb-2">
                    <div class="card-body">
                        <a class="text-reset mb-2" href="{{ $event->url}}" target="_blank">
                            <h6 class="card-title text-truncate">{{ $event->title }}</h6>
                        </a>
                        <div class="mb-2">
                            @foreach($event->tags as $tag)
                            <a class="me-1" href="?tag={{ $tag->id }}#tabs">#{{ $tag->name }}</a>
                            @endforeach
                        </div>
                        <ul class="list-group list-group-horizontal border-0">
                            <li class="list-group-item text-nowrap pt-0 pb-0 ps-0 border-0">
                                <i class="bi bi-calendar-event-fill color-secondary me-2"></i>
                                <small>{{ $event->date }}</small>
                            </li>
                            <li class="list-group-item text-nowrap pt-0 pb-0 border-0 border-start border-end">
                                <i class="bi bi-clock-fill color-secondary me-2"></i>
                                @if ($event->time == '00:00')
                                <small>уточняется</small>
                                @else
                                <small>{{ $event->time }}</small>
                                @endif
                            </li>
                            <li class="list-group-item text-nowrap pt-0 pb-0 pe-0 border-0">
                                <i class="bi bi-credit-card-2-front-fill color-secondary me-2"></i>
                                <small>{{ $event->participation }}</small>
                            </li>
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
            {{-- Все --}}

            {{-- Бесплатно --}}
            <div class="tab-pane fade" id="pills-free" role="tabpanel" aria-labelledby="pills-free-tab" tabindex="0"
                style="min-height: 100vh">
                @if ( empty($e_free[0]))
                <div class="card">
                    <div class="card-body">Таких мероприятий сейчас нет</div>
                </div>
                @endif
                @foreach($e_free as $event)
                <div class="card light-shadow border-0 rounded-element mb-2">
                    <div class="card-body">
                        <a class="text-reset mb-2" href="{{ $event->url}}" target="_blank">
                            <h6 class="card-title text-truncate">{{ $event->title }}</h6>
                        </a>
                        <div class="mb-2">
                            @foreach($event->tags as $tag)
                            <a class="me-1" href="?tag={{ $tag->id }}#tabs">#{{ $tag->name }}</a>
                            @endforeach
                        </div>
                        <ul class="list-group list-group-horizontal border-0">
                            <li class="list-group-item text-nowrap pt-0 pb-0 ps-0 border-0">
                                <i class="bi bi-calendar-event-fill color-secondary me-2"></i>
                                <small>{{ $event->date }}</small>
                            </li>
                            <li class="list-group-item text-nowrap pt-0 pb-0 border-0 border-start border-end">
                                <i class="bi bi-clock-fill color-secondary me-2"></i>
                                @if ($event->time == '00:00')
                                <small>уточняется</small>
                                @else
                                <small>{{ $event->time }}</small>
                                @endif
                            </li>
                            <li class="list-group-item text-nowrap pt-0 pb-0 pe-0 border-0">
                                <i class="bi bi-credit-card-2-front-fill color-secondary me-2"></i>
                                <small>{{ $event->participation }}</small>
                            </li>
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
            {{-- Бесплатно --}}

            {{-- Сегодня --}}
            <div class="tab-pane fade" id="pills-today" role="tabpanel" aria-labelledby="pills-today-tab" tabindex="0"
                style="min-height: 100vh">
                @if ( empty($e_today[0]))
                <div class="card">
                    <div class="card-body">Таких мероприятий сейчас нет</div>
                </div>
                @endif
                @foreach($e_today as $event)
                <div class="card light-shadow border-0 rounded-element mb-2">
                    <div class="card-body">
                        <a class="text-reset mb-2" href="{{ $event->url}}" target="_blank">
                            <h6 class="card-title text-truncate">{{ $event->title }}</h6>
                        </a>
                        <div class="mb-2">
                            @foreach($event->tags as $tag)
                            <a class="me-1" href="?tag={{ $tag->id }}#tabs">#{{ $tag->name }}</a>
                            @endforeach
                        </div>
                        <ul class="list-group list-group-horizontal border-0">
                            <li class="list-group-item text-nowrap pt-0 pb-0 ps-0 border-0">
                                <i class="bi bi-calendar-event-fill color-secondary me-2"></i>
                                <small>{{ $event->date }}</small>
                            </li>
                            <li class="list-group-item text-nowrap pt-0 pb-0 border-0 border-start border-end">
                                <i class="bi bi-clock-fill color-secondary me-2"></i>
                                @if ($event->time == '00:00')
                                <small>уточняется</small>
                                @else
                                <small>{{ $event->time }}</small>
                                @endif
                            </li>
                            <li class="list-group-item text-nowrap pt-0 pb-0 pe-0 border-0">
                                <i class="bi bi-credit-card-2-front-fill color-secondary me-2"></i>
                                <small>{{ $event->participation }}</small>
                            </li>
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
            {{-- Сегодня --}}

            {{-- Завтра --}}
            <div class="tab-pane fade" id="pills-tomorrow" role="tabpanel" aria-labelledby="pills-tomorrow-tab"
                tabindex="0" style="min-height: 100vh">
                @if ( empty($e_tomorrow[0]))
                <div class="card">
                    <div class="card-body">Таких мероприятий сейчас нет</div>
                </div>
                @endif
                @foreach($e_tomorrow as $event)
                <div class="card light-shadow border-0 rounded-element mb-2">
                    <div class="card-body">
                        <a class="text-reset mb-2" href="{{ $event->url}}" target="_blank">
                            <h6 class="card-title text-truncate">{{ $event->title }}</h6>
                        </a>
                        <div class="mb-2">
                            @foreach($event->tags as $tag)
                            <a class="me-1" href="?tag={{ $tag->id }}#tabs">#{{ $tag->name }}</a>
                            @endforeach
                        </div>
                        <ul class="list-group list-group-horizontal border-0">
                            <li class="list-group-item text-nowrap pt-0 pb-0 ps-0 border-0">
                                <i class="bi bi-calendar-event-fill color-secondary me-2"></i>
                                <small>{{ $event->date }}</small>
                            </li>
                            <li class="list-group-item text-nowrap pt-0 pb-0 border-0 border-start border-end">
                                <i class="bi bi-clock-fill color-secondary me-2"></i>
                                @if ($event->time == '00:00')
                                <small>уточняется</small>
                                @else
                                <small>{{ $event->time }}</small>
                                @endif
                            </li>
                            <li class="list-group-item text-nowrap pt-0 pb-0 pe-0 border-0">
                                <i class="bi bi-credit-card-2-front-fill color-secondary me-2"></i>
                                <small>{{ $event->participation }}</small>
                            </li>
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
            {{-- Завтра --}}

            {{-- Выходные --}}
            <div class="tab-pane fade" id="pills-weeckend" role="tabpanel" aria-labelledby="pills-weeckend-tab"
                tabindex="0" style="min-height: 100vh">
                @if ( empty($e_weeckend[0]))
                <div class="card">
                    <div class="card-body">Таких мероприятий сейчас нет</div>
                </div>
                @endif
                @foreach($e_weeckend as $event)
                <div class="card light-shadow border-0 rounded-element mb-2">
                    <div class="card-body">
                        <a class="text-reset mb-2" href="{{ $event->url}}" target="_blank">
                            <h6 class="card-title text-truncate">{{ $event->title }}</h6>
                        </a>
                        <div class="mb-2">
                            @foreach($event->tags as $tag)
                            <a class="me-1" href="?tag={{ $tag->id }}#tabs">#{{ $tag->name }}</a>
                            @endforeach
                        </div>
                        <ul class="list-group list-group-horizontal border-0">
                            <li class="list-group-item text-nowrap pt-0 pb-0 ps-0 border-0">
                                <i class="bi bi-calendar-event-fill color-secondary me-2"></i>
                                <small>{{ $event->date }}</small>
                            </li>
                            <li class="list-group-item text-nowrap pt-0 pb-0 border-0 border-start border-end">
                                <i class="bi bi-clock-fill color-secondary me-2"></i>
                                @if ($event->time == '00:00')
                                <small>уточняется</small>
                                @else
                                <small>{{ $event->time }}</small>
                                @endif
                            </li>
                            <li class="list-group-item text-nowrap pt-0 pb-0 pe-0 border-0">
                                <i class="bi bi-credit-card-2-front-fill color-secondary me-2"></i>
                                <small>{{ $event->participation }}</small>
                            </li>
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
            {{-- Выходные --}}

            {{-- С детьми --}}
            <div class="tab-pane fade" id="pills-childs" role="tabpanel" aria-labelledby="pills-childs-tab" tabindex="0"
                style="min-height: 100vh">
                @if ( empty($e_child[0]))
                <div class="card">
                    <div class="card-body">Таких мероприятий сейчас нет</div>
                </div>
                @endif
                @foreach($e_child as $event)
                <div class="card light-shadow border-0 rounded-element mb-2">
                    <div class="card-body">
                        <a class="text-reset mb-2" href="{{ $event->url}}" target="_blank">
                            <h6 class="card-title text-truncate">{{ $event->title }}</h6>
                        </a>
                        <div class="mb-2">
                            @foreach($event->tags as $tag)
                            <a class="me-1" href="?tag={{ $tag->id }}#tabs">#{{ $tag->name }}</a>
                            @endforeach
                        </div>
                        <ul class="list-group list-group-horizontal border-0">
                            <li class="list-group-item text-nowrap pt-0 pb-0 ps-0 border-0">
                                <i class="bi bi-calendar-event-fill color-secondary me-2"></i>
                                <small>{{ $event->date }}</small>
                            </li>
                            <li class="list-group-item text-nowrap pt-0 pb-0 border-0 border-start border-end">
                                <i class="bi bi-clock-fill color-secondary me-2"></i>
                                @if ($event->time == '00:00')
                                <small>уточняется</small>
                                @else
                                <small>{{ $event->time }}</small>
                                @endif
                            </li>
                            <li class="list-group-item text-nowrap pt-0 pb-0 pe-0 border-0">
                                <i class="bi bi-credit-card-2-front-fill color-secondary me-2"></i>
                                <small>{{ $event->participation }}</small>
                            </li>
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
            {{-- С детьми --}}

            {{-- По тегу --}}
            @if(!empty($active_tag))
            <div class="tab-pane fade @if(!empty($active_tag)) show active @endif" id="pills-tags" role="tabpanel"
                aria-labelledby="pills-tags-tab" tabindex="0" style="min-height: 100vh">
                @foreach($e_tags as $event)
                <div class="card light-shadow border-0 rounded-element mb-2">
                    <div class="card-body">
                        <a class="text-reset mb-2" href="{{ $event->url}}" target="_blank">
                            <h6 class="card-title text-truncate">{{ $event->title }}</h6>
                        </a>
                        <div class="mb-2">
                            @foreach($event->tags as $tag)
                            <a class="me-1" href="?tag={{ $tag->id }}#tabs">#{{ $tag->name }}</a>
                            @endforeach
                        </div>
                        <ul class="list-group list-group-horizontal border-0">
                            <li class="list-group-item text-nowrap pt-0 pb-0 ps-0 border-0">
                                <i class="bi bi-calendar-event-fill color-secondary me-2"></i>
                                <small>{{ $event->date }}</small>
                            </li>
                            <li class="list-group-item text-nowrap pt-0 pb-0 border-0 border-start border-end">
                                <i class="bi bi-clock-fill color-secondary me-2"></i>
                                @if ($event->time == '00:00')
                                <small>уточняется</small>
                                @else
                                <small>{{ $event->time }}</small>
                                @endif
                            </li>
                            <li class="list-group-item text-nowrap pt-0 pb-0 pe-0 border-0">
                                <i class="bi bi-credit-card-2-front-fill color-secondary me-2"></i>
                                <small>{{ $event->participation }}</small>
                            </li>
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
            {{-- По тегу --}}

        </div>
        {{-- End Tab Contents --}}

    </div>
    {{-- End Events --}}

    {{-- Add Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    {{-- End Add Bootstrap --}}

    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

    {{-- Custom Scripts --}}
    <script type="text/javascript" src="/storage/js/formAddEvent.js?v<?=$v?>"></script>
    {{-- End Custom Scripts --}}

</body>

</html>