<?php

namespace App\View\Components\Frontpage;

use Illuminate\View\Component;

class EventCards extends Component
{
    public $events;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($events)
    {
        $this->events = $events;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.frontpage.event-cards');
    }
}
