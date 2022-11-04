<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Демо Bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    {{--Slick--}}
    <link rel="stylesheet" type="text/css" href="vendor\slick\slick.css"/>
    <link rel="stylesheet" type="text/css" href="vendor\slick\slick-theme.css"/>
</head>
<body>

{{--Navigation--}}
<nav class="container device d-flex justify-content-between align-items-center pt-2 pb-2">
    <small><a href="#" class="link-dark text-decoration-none">О проекте</a></small>
    <div class="d-flex align-items-center">
        <small>Знаете о мероприятии?</small>
        <a href="#" class="ms-3 btn btn-sm btn-dark rounded-pill"><b>Добавить</b></a>
    </div>
</nav>

{{--Slick--}}
<div class="container device center p-0 mt-5">
    @foreach($events_all as $event)
        <div class="card rounded-5 ms-1 me-1 border-0 soft-shadow">
            <img src="{{ $event->logo }}" class="card-img-top rounded-self" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ Str::limit($event->title, 50) }}</h5>
                <p class="card-text">{{ $event->id }}</p>
            </div>
        </div>
    @endforeach
</div>


<style>
    .device {
        max-width: 768px;
    }

    .rounded-self {
        border-top-left-radius: calc(2rem - 1px) !important;
        border-top-right-radius: calc(2rem - 1px) !important;

    }

    .soft-shadow {
        -webkit-box-shadow: 0px 0px 25px 0px rgba(34, 60, 80, 0.15);
        -moz-box-shadow: 0px 0px 25px 0px rgba(34, 60, 80, 0.15);
        box-shadow: 0px 0px 25px 0px rgba(34, 60, 80, 0.15);
    }

    .slick-track {
        padding-top: 16px;
        padding-bottom: 16px;
    }

    .slick-slide {
        transform: scale(0.8);
        transition: .4s ease-out;
    }
    .slick-active {
        transform: scale(1);
        transition: .4s ease-out;

    }
</style>


{{--@foreach($events_all as $event)--}}
{{--    <div class="card mb-3" style="max-width: 540px;">--}}
{{--        <div class="row g-0">--}}
{{--            <div class="col-md-4">--}}
{{--                <img src="{{ $event->logo }}" class="img-fluid rounded-start" alt="...">--}}
{{--            </div>--}}
{{--            <div class="col-md-8">--}}
{{--                <div class="card-body">--}}
{{--                    <h5 class="card-title">{{ $event->title }}</h5>--}}
{{--                    <p class="card-text">{{ print_r(json_decode($event->tags)) }}</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endforeach--}}


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>

<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="vendor\slick\slick.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('.center').slick({
            centerMode: true,
            centerPadding: '60px',
            slidesToShow: 1,
            autoplay: true,
            autoplaySpeed: 7000,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '50px',
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '50px',
                        slidesToShow: 1
                    }
                }
            ]
        });
    });
</script>

</body>
</html>
