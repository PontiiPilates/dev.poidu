<?php

namespace App\Http\Controllers;

/**
 ** Изучение работы сервис-контейнеров, сервис-провайдеров и внедрения зависимостей
 */

use App\Services\BinanceAPI;
use App\Contracts\ExchangeAPI;

class EduContainerController extends Controller
{
    // Жесткая реализация
    public function hard(BinanceAPI $binance)
    {
        return view('eduContainer', [
            'API' => $binance,
        ]);
    }

    // Реализация через интерфейс
    public function abstract(ExchangeAPI $exchange)
    {
        return view('eduContainer', [
            'API' => $exchange, 
        ]);
    }
}


// will be - будет
// explain - объяснять
// to you - тебе
// of - из
// benefits - преимущества
// must have - должны быть
// understanding - полнимание
// all right - хорошо