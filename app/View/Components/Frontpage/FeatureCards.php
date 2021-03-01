<?php

namespace App\View\Components\Frontpage;

use Illuminate\View\Component;

class FeatureCards extends Component
{
    public $recreations;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($recreations)
    {
        $this->recreations = $recreations;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.frontpage.feature-cards');
    }
}
