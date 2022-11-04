<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class FrontendController extends Controller
{
    public function general()
    {
        $events_all = Event::all();

        return view('template', ['events_all' => $events_all]);
    }
}