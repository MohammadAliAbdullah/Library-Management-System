<?php

namespace App\Http\Controllers\admin;

use Calendar;
use App\Event;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function index()
    {
        $events = [];
        $data = Event::all();
        if ($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                $value->title,
                true,
                new \DateTime($value->start_date),
                new \DateTime($value->end_date.' +1 day')
            );
            }
        }

        $calendar = Calendar::addEvents($events);

        return view('mycalender', compact('calendar'));
    }
}
