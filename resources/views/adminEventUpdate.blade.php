<!doctype html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- For SEO --}}
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>Poidu | Кабинет администратора</title>
    {{-- End For SEO --}}

    {{-- Add Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    {{-- End Add Bootstrap --}}

    {{-- Favicon --}}
    <link rel="icon" href="/public/favicon.svg" type="image/svg+xml">
    {{-- End Favicon --}}

    {{-- JQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    {{-- End JQuery --}}

</head>

<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg bg-light mb-3">
        <div class="container">
            <div><a class="navbar-brand" href="/admin/events/publisher/273076">Опочевальня
                    модератора</a><small>pre-alpha version</small></div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Переключатель навигации">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    {{-- Navbar --}}

    {{-- About --}}
    <div class="container mb-5">
        <div class="card">
            <div class="card-body">
                <p><small>Здесь отображаются все мероприятия в порядке добавления, где новые находятся вверху. Прошедшие
                        мероприятия здесь не отображаются, ибо нах надо.</small></p>
                <p><small>Это нужно для модерации мероприятий, которые будут добавлять пользователи. Если с мероприятием
                        все классно, то его можно публиковать. Если есть небольшая ошибка, например в заголовке, то
                        можно ее поправить и опубликовать. Если пришел спам или порно, то достаточно его просто
                        проигнорировать.</small></p>
                <p><small>Чтобы отредактировать мероприятие, достаточно кликнуть по заголовку, откроется форма
                        редактирования. Чтобы изменения вступили в силу, нужно нажать "Сохранить". Чтобы вернуться
                        назад, нужно нажать на "Опочевальня модератора".</small></p>
            </div>
        </div>
    </div>
    {{-- About --}}


    {{-- Events --}}
    <div class="container">

        {{-- Форма --}}
        <form name="formEventUpdate" id="formEventUpdate">
            @csrf

            {{-- Идентификатор меропприятия --}}
            <input type="hidden" name="id" value="{{ $event->id}}">
            {{-- Идентификатор меропприятия --}}

            {{-- Title --}}
            <div class="mb-3">
                <label for="title" class="col-form-label">Название: <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Поход на Солбы"
                    value="{{ $event->title }}">
                <div id="titleInvalid" class="invalid-feedback"></div>
            </div>
            {{-- Title --}}

            {{-- Tags --}}
            @php
            $tags_list = [];
            foreach ($event->tags as $tag) {
            $tags_list[] = $tag->alias;
            }
            @endphp
            @foreach($tags as $tag)
            <div class="form-check form-check-inline">
                @if( in_array($tag->alias, $tags_list))
                <input class="form-check-input" type="checkbox" value="{{ $tag->alias }}" id="{{ $tag->alias }}"
                    name="tags[]" checked>
                @else
                <input class="form-check-input" type="checkbox" value="{{ $tag->alias }}" id="{{ $tag->alias }}"
                    name="tags[]">
                @endif
                <label class="form-check-label link-primary" for="{{ $tag->alias }}">#{{ $tag->name }}</label>
            </div>
            @endforeach
            {{-- Tags --}}

            {{-- URL --}}
            <div class="mb-3">
                <label for="url" class="col-form-label">Ссылка на источник: <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="url" name="url" placeholder="https://source.some..."
                    value="{{ $event->url}}">
                <div id="urlInvalid" class="invalid-feedback"></div>
            </div>
            {{-- URL --}}

            {{-- Дата и время --}}
            @php
            $date = explode(' ', $event->begin);
            $date = $date[0];
            @endphp
            <div class="row mb-3">
                <div class="col">
                    <label for="date" class="col-form-label">Дата начала: <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="date" name="date" value="{{ $date }}">
                    <div id="dateInvalid" class="invalid-feedback"></div>
                </div>
                <div class="col">
                    <label for="time" class="col-form-label">Время начала: <span class="text-danger">*</span></label>
                    <input type="time" class="form-control" id="time" name="time" value="{{ $event->time }}">
                    <div id="timeInvalid" class="invalid-feedback"></div>
                </div>
            </div>
            {{-- Дата и время --}}

            {{-- Форма участия --}}
            <fieldset class="row mb-3">
                <legend class="col-form-label pt-0">Участие: <span class="text-danger">*</span></legend>
                <div class="d-flex">
                    <div class="form-check me-3">
                        <input class="form-check-input" type="radio" id="freeParticipation" name="participation"
                            value="free" @if($event->participation == 'Бесплатно') checked @endif>
                        <label class="form-check-label" for="freeParticipation">Бесплатно</label>
                    </div>
                    <div class="form-check me-3">
                        <input class="form-check-input" type="radio" id="donateParticipation" name="participation"
                            value="donate" @if($event->participation == 'Донат') checked @endif>
                        <label class="form-check-label" for="donateParticipation">Донат</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="moneyParticipation" name="participation"
                            value="money" @if($event->participation !== 'Бесплатно' && $event->participation !==
                        'Донат') checked @endif>
                        <label class="form-check-label" for="moneyParticipation">Покупка</label>
                    </div>
                </div>
                <div class="mb-3" id="rowPrice">
                    <label for="price" class="col-form-label">Стоимость (руб.): <span class="text-danger">*</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="1200"
                        @if($event->participation !== 'free' && $event->participation !== 'donate') value="{{
                    $event->price }}" @endif>
                    <div id="priceInvalid" class="invalid-feedback"></div>
                </div>
            </fieldset>
            {{-- Форма участия --}}

            {{-- Notification --}}
            {{-- <div class="form-check">
                <input class="form-check-input" type="checkbox" id="notification" name="notification" value="true">
                <label class="form-check-label" for="notification">Уведомить о добавлении</label>
            </div>
            <div class="mb-3" id="rowEmail">
                <label for="email" class="col-form-label">Email: <span class="text-danger">*</span></label>
                <input type="email" class="form-control" id="email" name="email">
                <div id="emailInvalid" class="invalid-feedback"></div>

            </div> --}}
            {{-- Notification --}}


        </form>
        <button type="submit" id="submitFormEventUpdate" class="btn btn-warning">Сохранить</button>
        {{-- Форма --}}
    </div>


    <button id="showAddEventMessage" type="hidden" class="btn btn-primary d-none" data-bs-target="#addEventModalMessage" data-bs-toggle="modal">Открыть модальное окно</button>

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
                </div>
                <div class="modal-footer justify-content-start">
                    <button type="button" class="btn btn-dark rounded-5" data-bs-dismiss="modal">Закрыть</button>
                    <a href="http://dev.poidu/admin/events/publisher/273076" class="btn btn-link">Вернуться в опочевальню модератора</a>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Add Event Message --}}





    {{-- {{ dd($validator )}} --}}

    {{-- Add Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    {{-- End Add Bootstrap --}}

    {{-- Custom Scripts --}}
    {{-- <script type="text/javascript" src="/resources/js/formAddEvent.js"></script> --}}
    {{-- End Custom Scripts --}}

    <script>
        var radioMoneyParticipation = document.getElementById('moneyParticipation');
        var rowPrice = $('#rowPrice');
    
        var selectorNotification = document.getElementById('notification');
        var fieldEmail = $('#rowEmail');
    
        // Проверка селектора price на checked при загрузке страницы
        if (radioMoneyParticipation.checked) {
            rowPrice.show(0.3);
        } else {
            rowPrice.hide(0.3);
        }
    
        // Проверка селектора notification на checked при загрузке страницы
        // if (selectorNotification.checked) {
        //     fieldEmail.show(0.3);
        // } else {
        //     fieldEmail.hide(0.3);
        // }
    
        // Если выбран селектор free
        $('#freeParticipation').change(function () {
            rowPrice.hide(0.3);
        });
    
        // Если выбран селектор donate
        $('#donateParticipation').change(function () {
            rowPrice.hide(0.3);
        });
    
        // Если выбран селектор price
        $('#moneyParticipation').change(function () {
            rowPrice.show(0.3);
        });

/**
 * Ajax
 */
$("#submitFormEventUpdate").click(function (validate) {

    $.ajax({
        url: '/api/event/update',
        data: $('#formEventUpdate').serializeArray(),
        type: "POST",
        // dataType: "json",
    }).done(function (res) {

        console.log(res);

        // очистка формы от ошибок валидации
        while ($(".is-invalid").length > 0) {
            $(".is-invalid").removeClass("is-invalid");
        }

        // если обнаружены ошибки валидации
        if (res['invalid']) {

            // получение ключей невалидных полей
            for (let key of Object.keys(res['invalid'])) {
                // получение полей, содержащих ошибки
                let invalidField = '#' + key;
                // добавление класса ошибки
                $(invalidField).addClass("is-invalid");

                // получение блоков сообщений для ошибок
                let invalidMessage = '#' + key + 'Invalid';
                // добавление текста ошибки
                $(invalidMessage).text(res['invalid'][key]);
            }

        }

        // если событие успешно добавлено
        if (res['status'] == 'updated') {
            $('#showAddEventMessage').click();
            // $('#formAddEvent')[0].reset();
            $('#messageAboutEvent').text(res['message']);
            // $('#eventStatusLink').attr('href', res['link']).text(res['link']);
        }


    }).fail(function (xhr, status, errorThrown) {
        // console.log(xhr, status, errorThrown);
        // console.log("Error: " + errorThrown);
        // console.log("Status: " + status);
        // console.dir(xhr);
    }).always(function (xhr, status) {
        // alert("The request is complete!");
    });
});

    </script>
</body>

</html>