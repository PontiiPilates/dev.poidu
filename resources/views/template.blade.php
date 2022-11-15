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
    <link rel="stylesheet" type="text/css" href="vendor\slick\slick.css" />
    <link rel="stylesheet" type="text/css" href="vendor\slick\slick-theme.css" />
    {{-- End Add Slick--}}

    {{-- Favicon --}}
    <link rel="icon" href="/public/favicon.svg" type="image/svg+xml">
    {{-- End Favicon --}}

    {{-- Main CSS --}}
    <link rel="stylesheet" href="/resources/css/style.css">
    {{-- End Main CSS --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


</head>

<body>

    {{-- Promo --}}
    <div class="container text-center mt-3 mb-3">
        <a href="/" class="text-decoration-none">
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
                <a class="nav-link" href="#">О проекте</a>
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
                        <img src="/public/favicon.svg" height="32" class="d-block" alt="">
                        <small class="d-block fs-12 ms-3">
                            Если Вы знаете о мероприятии или организуете его сами, то скорее поделитесь им. Подробнее о
                            правилах размещения
                            <a href="/about#rules">здесь</a>.</small>
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
                        <div class="form-check">
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
                    {{-- <p>Следить за статусом мероприятия можно по этой ссылке <a href="#" id="eventStatusLink"></a></p> --}}
                    <p>Подробнее ознакомиться с правилами публикации мероприятий можно <a href="/about#rules">здесь</a>.</p>
                </div>
                <div class="modal-footer justify-content-start">
                    <button type="button" class="btn btn-dark rounded-5" data-bs-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Add Event Message --}}




    {{-- Slick --}}
    <div class="container device center p-0 mb-5">
        @foreach($events as $event)
        <div class="card rounded-element border-0 soft-shadow">
            <img src="{{ $event->logo }}" class="card-img-top rounded-image" alt="{{ $event->logo }}">
            <div class="card-body">
                <h6 class="card-title">{{ Str::limit($event->title, 29) }}</h6>

                <p class="fs-14">{{ Str::limit('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto
                    aspernatur at dignissimos
                    distinctio eius error est excepturi, fuga fugiat id laborum magnam neque quaerat sapiente sunt
                    tempore
                    temporibus veniam voluptas.', 120) }}</p>

                <div class="d-flex justify-content-between align-items-baseline">
                    <small class="color-secondary">{{ $event->date }} в {{ $event->time }}</small>
                    <span><b>{{ $event->payment }}</b></span>
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
                    id="pills-today-tab" data-bs-toggle="pill" data-bs-target="#pills-today" type="button" role="tab"
                    aria-controls="pills-today" aria-selected="true">Сегодня
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link rounded-pill text-nowrap text-reset" id="pills-tomorrow-tab"
                    data-bs-toggle="pill" data-bs-target="#pills-tomorrow" type="button" role="tab"
                    aria-controls="pills-tomorrow" aria-selected="false">Завтра
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link rounded-pill text-nowrap text-reset" id="pills-weeckend-tab"
                    data-bs-toggle="pill" data-bs-target="#pills-weeckend" type="button" role="tab"
                    aria-controls="pills-weeckend" aria-selected="false">Выходные
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link rounded-pill text-nowrap text-reset" style="margin-right: 12px"
                    id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-childs" type="button" role="tab"
                    aria-controls="pills-childs" aria-selected="false">С детьми
                </button>
            </li>
        </ul>
        {{-- End Tabs --}}

        {{-- Tab Contents --}}
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-today" role="tabpanel" aria-labelledby="pills-today-tab"
                tabindex="0">
                @foreach($events as $event)
                <div class="card soft-shadow border-0 rounded-element mb-2">
                    <div class="card-body">
                        <h6 class="card-title">{{ Str::limit($event->title, 39) }}</h6>
                        <div>
                            @foreach($event->tags as $tag)
                            <a href="?tag={{ $tag->id }}">#{{ $tag->name }}</a>
                            @endforeach
                        </div>
                        <p class="card-text"></p>

                        <ul class="list-group list-group-horizontal border-0">
                            <li class="list-group-item text-nowrap pt-0 pb-0 ps-0 border-0">
                                <i class="bi bi-calendar-event-fill color-secondary me-2"></i>
                                <small>{{ $event->date }}</small>
                            </li>
                            <li class="list-group-item text-nowrap pt-0 pb-0 border-0 border-start border-end">
                                <i class="bi bi-clock-fill color-secondary me-2"></i>
                                <small>{{ $event->time }}</small>
                            </li>
                            <li class="list-group-item text-nowrap pt-0 pb-0 pe-0 border-0">
                                <i class="bi bi-credit-card-2-front-fill color-secondary me-2"></i>
                                <small>{{ $event->payment }}</small>
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
            <div class="tab-pane fade" id="pills-childs" role="tabpanel" aria-labelledby="pills-childs-tab"
                tabindex="0">
                Childs
            </div>
        </div>
        {{-- End Tab Contents --}}

    </div>
    {{-- End Events --}}

    {{-- Add Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    {{-- End Add Bootstrap --}}

    {{-- Add Slick --}}
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="vendor\slick\slick.min.js"></script>
    <script type="text/javascript" src="/resources/js/slick.js"></script>
    {{-- End Add Slick --}}

    {{-- Custom Scripts --}}
    <script type="text/javascript" src="/resources/js/formAddEvent.js"></script>
    {{-- End Custom Scripts --}}

</body>

</html>