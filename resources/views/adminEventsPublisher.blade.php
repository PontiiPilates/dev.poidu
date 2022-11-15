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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    {{-- End Add Bootstrap --}}

    {{-- Favicon --}}
    <link rel="icon" href="/public/favicon.svg" type="image/svg+xml">
    {{-- End Favicon --}}

    {{-- JQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    {{-- End JQuery --}}

</head>

<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg bg-light mb-3">
        <div class="container">
            <div><a class="navbar-brand" href="/admin/events/publisher/273076">Опочевальня модератора</a><small>pre-alpha version</small></div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Переключатель навигации">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    {{-- Navbar --}}

    {{-- About --}}
    <div class="container mb-5">
        <div class="card">
            <div class="card-body">
                <p><small>Здесь отображаются все мероприятия в порядке добавления, где новые находятся вверху. Прошедшие мероприятия здесь не отображаются, ибо нах надо.</small></p>
                <p><small>Это нужно для модерации мероприятий, которые будут добавлять пользователи. Если с мероприятием все классно, то его можно публиковать. Если есть небольшая ошибка, например в заголовке, то можно ее поправить и опубликовать. Если пришел спам или порно, то достаточно его просто проигнорировать.</small></p>
                <p><small>Чтобы отредактировать мероприятие, достаточно кликнуть по заголовку, откроется форма редактирования. Чтобы изменения вступили в силу, нужно нажать "Сохранить". Чтобы вернуться назад, нужно нажать на "Опочевальня модератора".</small></p>
            </div>
        </div>
    </div>
    {{-- About --}}

    {{-- Events --}}
    <div class="container">
        <table class="table table-sm table-hover">
            <thead>
                <tr>
                    <th scope="col">Создано</th>
                    <th scope="col">Мероприятие</th>
                    <th scope="col">Источник</th>
                    <th scope="col">Участие</th>
                    <th scope="col">Начало</th>
                    <th scope="col">Действие</th>
                </tr>
            </thead>
            @foreach ($events as $event)
            <tr>
                <td>
                    {{-- Индиактор опубликованности --}}
                    @if ($event->status == 1)
                    <i class="bi bi-brightness-low-fill" style="color:forestgreen;"></i>
                    @else
                    <i class="bi bi-brightness-low" style="color:dimgray;"></i>
                    @endif
                    {{-- Индиактор опубликованности --}}
                    {{ $event->created_at }}
                </td>
                <td><a class="" href="/admin/event/{{ $event->id }}/update/273076"><i class="bi bi-pencil me-2"></i>{{Str::limit($event->title, 64) }}</a></td>
                <td><a href="{{ $event->url }}"><i class="bi bi-eye me-2"></i>Перейти</a></td>
                <td>{{ $event->participation }}</td>
                <td>{{ $event->date }} в {{ $event->time }}</td>
                <td>
                    @if ($event->status == 1)
                    <form action="/api/events/publisher" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $event->id }}" name="id">
                        <input type="hidden" value="0" name="status">
                        <button type="submit" class="btn btn-sm btn-light w-100 text-start"><i class="bi bi-x-circle me-2"></i>Снять</button>
                    </form>
                    @else
                    <form action="/api/events/publisher" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $event->id }}" name="id">
                        <input type="hidden" value="1" name="status">
                        <button type="submit" class="btn btn-sm btn-secondary w-100 text-start"><i class="bi bi-escape me-2"></i>Опубликовать</button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    {{-- Events --}}

    {{-- Add Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    {{-- End Add Bootstrap --}}

    {{-- Custom Scripts --}}
    {{-- <script type="text/javascript" src="/resources/js/formAddEvent.js"></script> --}}
    {{-- End Custom Scripts --}}
</body>
</html>