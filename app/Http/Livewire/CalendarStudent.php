<?php

namespace App\Http\Livewire;

use App\Event;
use Livewire\Component;

class CalendarStudent extends Component
{
    public $events = '';

    public function getevent()
    {
        $events = Event::select('id', 'title', 'start')->get();

        return  json_encode($events);
    }


    public function render()
    {

        $this->events = $this->getevent();
        return view('livewire.calendar-student');
    }
}
