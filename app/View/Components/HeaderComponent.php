<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HeaderComponent extends Component
{
    public $page_title;

    /**
     * Create a new component instance.
     */
    public function __construct($pageTitle)
    {
        $this->page_title = $pageTitle;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.header-component');
    }
}
