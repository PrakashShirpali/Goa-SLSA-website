<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ActandRules extends Component
{
    public $title;
    public $items;

    // The constructor receives the parameters passed to the component
    public function __construct($title, $items)
    {
        $this->title = $title;
        $this->items = $items;
    }
    
    public function render(): View|Closure|string
    {
        return view('components.actand-rules');
    }
}
