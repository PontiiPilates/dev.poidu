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
    <meta name="description" content="
    Сервис для жителей Красноярска и гостей города, посвященный активному отдыху, отдыху с семьёй, туризму и путешествиям. Здесь вы найдете куда сходить в Красноярске и как провести выходные.">
    <meta name="keywords" content="красноярск, активный отдых, провести выходные, куда сходить, туризм, путешествия">
    {{-- End For SEO --}}

    {{-- Add Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    {{-- End Add Bootstrap --}}

    {{-- Add Slick--}}
    <link rel="stylesheet" type="text/css" href="vendor\slick\slick.css" />
    <link rel="stylesheet" type="text/css" href="vendor\slick\slick-theme.css" />
    {{-- End Add Slick--}}

    {{-- Favicon --}}
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    {{-- End Favicon --}}

    {{-- Main CSS --}}
    <link rel="stylesheet" href="/resources/css/style.css?v<?=$v?>">
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
    <section class="container device text-center pt-5 pb-5">

        {{-- Poidu is --}}
        <div class="mb-5" style="height: 124px;">
            <a class="text-decoration-none d-block" href="/"><span class="text-decoration-none text-reset brand" style="font-size: 72px; line-height: 72px"><b>Poidu</b></span></a>
            <p class="h4"><span class="text-secondary typed"></span></p>
        </div>
        {{-- Poidu is --}}

        {{-- SEO H1 --}}
        <div>
            <h1 class="">Poidu собирает на одной странице все походы, автобусные туры и экскурсии Красноярска</h1>
        </div>
        {{-- SEO H1 --}}

        {{-- Action --}}
        <div class="mt-5">
            <a href="/events" class="btn btn-accent rounded-element soft-shadow">Круто, хочу попробовать</a>
            <small class="d-block text-secondary">Тем более это бесплатно!</small>
        </div>
        {{-- Action --}}

    </section>
    {{-- Promo --}}


    
    {{-- Slick Mobile --}}
    <section class="container slider-mobile ps-0 pe-0 d-md-none">
        
        @php
        // массив загруженных изображений
        $images = ['promo01', 'promo02', 'promo03', 'promo04', 'promo05', 'promo06', 'promo07', 'promo08', 'promo09', 'promo10', 'promo11',];
        // сортировка в случайном порядке
        shuffle($images);
        @endphp

        @foreach ($images as $image)
        <img class="soft-shadow rounded-element" src="public\images\landing\{{ $image }}.jpg" alt="{{ $image }}">
        @endforeach
        
    </section>
    {{-- Slick Mobile --}}



    {{-- Slick Desctop --}}
    <section class="container-fluid slider-desctop d-none d-md-block ps-0 pe-0">
        
        @php
        // массив загруженных изображений
        $images = ['promo01', 'promo02', 'promo03', 'promo04', 'promo05', 'promo06', 'promo07', 'promo08', 'promo09', 'promo10', 'promo11',];
        // сортировка в случайном порядке
        shuffle($images);
        @endphp

        @foreach ($images as $image)
        <img class="soft-shadow rounded-element ms-3 me-3" src="public\images\landing\{{ $image }}.jpg" alt="{{ $image }}">
        @endforeach
        
    </section>
    {{-- Slick Desctop--}}



    {{-- Преимущества --}}
    <section class="container device text-center pt-5 pb-5 mt-5 mb-5">

        {{-- Заголовок --}}
        <div class="mb-5">
            <h2 class="h1">Вот как Poidu помогает своим пользователям</h2>
        </div>
        {{-- Заголовок --}}

        {{-- Фишка 1 --}}
        <div class="d-flex flex-column mb-4">
            <div><i class="bi bi-watch brand fs-1"></i></div>
            <b>Сохраняет время</b>
            <p class="card-text">На Poidu все мероприятия находятся на одна стринице. Искать на одной странице быстрее, чем среди десятков групп, сообществ, каналов, чатов, сайтов и форумов.</p>
        </div>
        {{-- Фишка 1 --}}

        {{-- Фишка 2 --}}
        <div class="d-flex flex-column mb-4">
            <div><i class="bi bi-fire brand fs-1"></i></div>
            <b>Расширяет кругозор</b>
            <p class="card-text">Poidu не ограничен источниками информации и расширяет их постоянно. Поэтому знает о мероприятиях, про которые вы не подозревали!</p>
        </div>
        {{-- Фишка 2 --}}

        {{-- Фишка 3 --}}
        <div class="d-flex flex-column">
            <div><i class="bi bi-plus-circle-fill brand fs-1"></i></div>
            <b>Позволяет добавлять мероприятия</b>
            <p class="card-text">Если вы знаете о мероприятии или организуете его сами, то можете добавить его на Poidu. Просто придерживайтесь тематического направления.</p>
        </div>
        {{-- Фишка 3 --}}

        {{-- Action --}}
        <div class="mt-5 text-center">
            <a href="/events" class="btn btn-accent rounded-element soft-shadow">Мне начинает нравиться Poidu</a>
        </div>
        {{-- Action --}}

    </section>
    {{-- Преимущества --}}



    {{-- Теги --}}
    <section class="container-fluid ps-0 pe-0 pt-5 pb-5 mt-5 mb-5 text-center soft-shadow" style="background-color: #F8F9FA">

        <div class="container device">

            {{-- Заголовок --}}
            <div class="mb-5">
                <h2 class="h1">Тематические направления</h2>
            </div>
            {{-- Заголовок --}}

            @php
            // получение всех тегов
            use App\Models\Tag;
            $tags = Tag::all();

            // цвета для тегов
            $classes = ['primary', 'secondary', 'success', 'danger', 'warning', 'info',];
            @endphp

            <div class="d-flex flex-wrap gap-3 justify-content-between">
                @foreach ($tags as $tag)
                <a class="btn btn-outline-{{ $classes[array_rand($classes, 1)] }} rounded-element flex-fill" href="/events?tag={{ $tag->id }}#tabs">#{{ $tag->name }}</a>
                @endforeach
            </div>

        </div>

    </section>
    {{-- Теги --}}



    {{-- Аудитория --}}
    <section class="container device pt-5 pb-5 mt-5 mb-5">

        {{-- Заголовок --}}
        <div class="mb-5 text-center">
            <h2 class="h1">Мы работаем для тех, кто:</h2>
        </div>
        {{-- Заголовок --}}

        <ul class="list-unstyled">
            <li class="d-flex align-items-center"><i class="bi bi-check2-square me-3 brand fs-3"></i>
                <p class="m-0">любит природу, активный отдых и новые места;</p>
            </li>
            <li class="d-flex align-items-center"><i class="bi bi-check2-square me-3 brand fs-3"></i>
                <p class="m-0">выбирает здоровье и движение;</p>
            </li>
            <li class="d-flex align-items-center"><i class="bi bi-check2-square me-3 brand fs-3"></i>
                <p class="m-0">ценит и планирует своё время;</p>
            </li>
            <li class="d-flex align-items-center"><i class="bi bi-check2-square me-3 brand fs-3"></i>
                <p class="m-0">хочет получить новые впечатления;</p>
            </li>
            <li class="d-flex align-items-center"><i class="bi bi-check2-square me-3 brand fs-3"></i>
                <p class="m-0">находится в поиске приключений;</p>
            </li>
            <li class="d-flex align-items-center"><i class="bi bi-check2-square me-3 brand fs-3"></i>
                <p class="m-0">организует туристические мероприятия;</p>
            </li>
            <li class="d-flex align-items-center"><i class="bi bi-check2-square me-3 brand fs-3"></i>
                <p class="m-0">ищет как провести выходные и куда сходить в Красноярске.</p>
            </li>
        </ul>

        {{-- Action --}}
        <div class="mt-5 text-center">
            <a href="/events" class="btn btn-accent rounded-element soft-shadow">Это же я! Приступаю.</a>
        </div>
        {{-- Action --}}

    </section>
    {{-- Аудитория --}}



    {{-- Подвал --}}
    <footer class="container-fluid text-center soft-shadow pt-5 pb-5 mt-5" style="background-color: #F8F9FA">
        <div class="container device">
            <span class="d-block">Есть вопросы, пожелания, предложения? Пишите: <a class="text-decoration-none" href="https://t.me/poidu">@poidu</a></span>
            <a class="d-block" href="https://t.me/poidu"><i class="bi bi-telegram me-2" style="color: #3390ec"></i></a>
        </div>
    </footer>
    {{-- Подвал --}}



    {{-- Add Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    {{-- End Add Bootstrap --}}

    {{-- Add Slick --}}
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="vendor\slick\slick.min.js"></script>
    <script type="text/javascript" src="vendor\typed.js-master\typed.min.js"></script>
    {{-- End Add Slick --}}

    {{-- Custom Scripts --}}
    <script type="text/javascript" src="/resources/js/formAddEvent.js?v<?=$v?>"></script>
    {{-- End Custom Scripts --}}

    <script>
        var typed = new Typed('.typed', {

            // non SEO variant
            strings: [
                "Навигатор туриста ^1000",
                "Органайзер охотника за приключениями ^1000",
                "Справочник путешественника ^1000",
                "Агрегатор туристических мероприятий ^1000",
            ],

            // stringsElement: '#typed-strings',

            typeSpeed: 80,
            loop: true,
            });
    </script>

    <script>
        $(document).ready(function () {
            $('.slider-mobile').slick({
                arrows: false,
                autoplay: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplaySpeed: 2000,
                infinite: true,
            });
        });

        $(document).ready(function () {
            $('.slider-desctop').slick({
                arrows: false,
                autoplay: true,
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplaySpeed: 3000,
                infinite: true,
            });
        });

    </script>

</body>

</html>