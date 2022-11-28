<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <p><b>Exchange:</b> {{ $API->getExchange() }}</p>
    <p><b>BTC_price:</b> {{ $API->getPrice() }}</p>
    <p><b>BTC_change:</b> {{ $API->getChange() }}</p>
</body>

</html>