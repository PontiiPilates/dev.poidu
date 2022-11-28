<?php

namespace App\Contracts;

interface ExchangeAPI
{
    // возвращает цену
    public function getPrice();

    // возвращает %-е изменение цены
    public function getChange();

    // возвращает название биржы, выступающей в качестве источника данных
    public function getExchange();
}
