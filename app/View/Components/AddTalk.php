<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;

class AddTalk extends Component
{
    /**
     * @var string
     */
    public $href;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($href)
    {
        $this->href = $href;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.add-talk');
    }
}
