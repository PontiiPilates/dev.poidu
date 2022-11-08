<!doctype html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- For SEO --}}
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>Poidu | Агрегатор туристических мероприятий</title>
    {{-- End For SEO --}}

    {{-- Add Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    {{-- End Add Bootstrap --}}

    {{-- Add Slick--}}
    <link rel="stylesheet" type="text/css" href="vendor\slick\slick.css"/>
    <link rel="stylesheet" type="text/css" href="vendor\slick\slick-theme.css"/>
    {{-- End Add Slick--}}

    {{-- Favicon --}}
    <link rel="icon" href="/public/favicon.svg" type="image/svg+xml">
    {{-- End Favicon --}}

    {{-- Main CSS --}}
    <link rel="stylesheet" href="/resources/css/style.css">
    {{-- End Main CSS --}}

</head>

<body>

{{-- Promo --}}
<div class="container text-center mt-3 mb-3">
    <h1 class="d-inline brand" style="font-size: 48px"><b>Poidu</b></h1>
    <p class="m-0"><small><b>Агрегатор туристических мероприятий</b></small></p>
    <p class="m-0"><small>Знаете о мероприятии? Добавьте его бесплатно!</small></p>
</div>
{{-- End Promo --}}

{{-- Navigation --}}
<nav class="container mb-5">
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link active rounded-pill text-reset" aria-current="page" href="#"><i
                    class="bi bi-plus-circle-fill brand me-2"></i>добавить</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">О проекте</a>
        </li>
    </ul>
</nav>
{{-- End Navigation --}}

{{-- Slick --}}
<div class="container device center p-0 mb-5">
    @foreach($events_all as $event)
        <div class="card rounded-element border-0 soft-shadow">
            <img src="{{ $event->logo }}" class="card-img-top rounded-image" alt="{{ $event->logo }}">
            <div class="card-body">
                <h6 class="card-title">{{ Str::limit($event->title, 29) }}</h6>

                @php
                    // именя для месяцев
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

                    // преобразование даты и времени
                    $start = explode(' ', $event->start);

                    $date = $start[0];
                    $date = explode('-', $date);
                    $date = $date[2] . ' ' . $monts[$date[1]];

                    $time = $start[1];
                    $time = explode(':', $time);
                    $time = $time[0] . ':' . $time[1];

                    // преобразование формы участия
                    if ($event->payment == 'free') {
                        $payment = 'Бесплатно';
                    } elseif($event->payment == 'donate') {
                        $payment = 'За донат';
                    } else {
                        $payment = $event->payment . ' руб.';
                    }

                    $lorem = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto aspernatur at dignissimos distinctio eius error est excepturi, fuga fugiat id laborum magnam neque quaerat sapiente sunt tempore temporibus veniam voluptas.';
                @endphp
                <p class="fs-14">{{ Str::limit($lorem, 120) }}</p>

                <div class="d-flex justify-content-between align-items-baseline">
                    <small class="color-secondary">{{ $date }} в {{ $time }}</small>
                    <span><b>{{ $payment }}</b></span>
                </div>

            </div>
        </div>
    @endforeach
</div>
{{-- End Slick --}}

{{-- Events --}}
<div class="container device">

    {{-- Tabs --}}
    <ul class="nav nav-pills mb-4 flex-nowrap crop" id="pills-tab" role="tablist"
        style="margin-left: -12px; margin-right: -12px">
        <li class="nav-item" role="presentation">
            <button class="nav-link rounded-pill text-nowrap text-reset active" style="margin-left: 12px"
                    id="pills-today-tab"
                    data-bs-toggle="pill" data-bs-target="#pills-today" type="button" role="tab"
                    aria-controls="pills-today" aria-selected="true">Сегодня
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link rounded-pill text-nowrap text-reset" id="pills-tomorrow-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-tomorrow" type="button" role="tab" aria-controls="pills-tomorrow"
                    aria-selected="false">Завтра
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link rounded-pill text-nowrap text-reset" id="pills-weeckend-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-weeckend" type="button" role="tab" aria-controls="pills-weeckend"
                    aria-selected="false">Выходные
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link rounded-pill text-nowrap text-reset" style="margin-right: 12px"
                    id="pills-contact-tab"
                    data-bs-toggle="pill"
                    data-bs-target="#pills-childs" type="button" role="tab" aria-controls="pills-childs"
                    aria-selected="false">С детьми
            </button>
        </li>
    </ul>
    {{-- End Tabs --}}

    {{-- Tab Contents --}}
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-today" role="tabpanel" aria-labelledby="pills-today-tab"
             tabindex="0">
            @foreach($events_all as $event)
                <div class="card soft-shadow border-0 rounded-element mb-2">
                    <div class="card-body">
                        <h6 class="card-title">{{ Str::limit($event->title, 39) }}</h6>
                        <div>
                            @php
                                $tags = json_decode($event->tags, true);
                            @endphp
                            @foreach($tags as $tag)
                                <a href="#">#{{$tag}}</a>
                            @endforeach
                        </div>
                        <p class="card-text"></p>

                        @php
                            // именя для месяцев
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

                            // преобразование даты и времени
                            $start = explode(' ', $event->start);

                            $date = $start[0];
                            $date = explode('-', $date);
                            $date = $date[2] . ' ' . $monts[$date[1]];

                            $time = $start[1];
                            $time = explode(':', $time);
                            $time = $time[0] . ':' . $time[1];

                            // преобразование формы участия
                            if ($event->payment == 'free') {
                                $payment = 'Бесплатно';
                            } elseif($event->payment == 'donate') {
                                $payment = 'За донат';
                            } else {
                                $payment = $event->payment . ' руб.';
                            }
                        @endphp

                        <ul class="list-group list-group-horizontal border-0">
                            <li class="list-group-item text-nowrap pt-0 pb-0 ps-0 border-0">
                                <i class="bi bi-calendar-event-fill color-secondary me-2"></i>
                                <small>{{ $date }}</small>
                            </li>
                            <li class="list-group-item text-nowrap pt-0 pb-0 border-0 border-start border-end">
                                <i class="bi bi-clock-fill color-secondary me-2"></i>
                                <small>{{ $time }}</small>
                            </li>
                            <li class="list-group-item text-nowrap pt-0 pb-0 pe-0 border-0">
                                <i class="bi bi-credit-card-2-front-fill color-secondary me-2"></i>
                                <small>{{ $payment }}</small>
                            </li>
                        </ul>

                    </div>

                </div>

            @endforeach

        </div>
        <div class="tab-pane fade" id="pills-tomorrow" role="tabpanel" aria-labelledby="pills-tomorrow-tab"
             tabindex="0">
            Tomorrow
        </div>
        <div class="tab-pane fade" id="pills-weeckend" role="tabpanel" aria-labelledby="pills-weeckend-tab"
             tabindex="0">
            Weekend
        </div>
        <div class="tab-pane fade" id="pills-childs" role="tabpanel" aria-labelledby="pills-childs-tab" tabindex="0">
            Childs
        </div>
    </div>
    {{-- End Tab Contents --}}

</div>
{{-- End Events --}}

{{-- Add Bootstrap --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
{{-- End Add Bootstrap --}}

{{-- Add Slick --}}
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="vendor\slick\slick.min.js"></script>
<script type="text/javascript" src="/resources/js/slick.js"></script>
{{-- End Add Slick --}}

</body>

</html>
