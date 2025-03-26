<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HeaderComponent extends Component
{
    public $page_title;
    public $success;

    /**
     * Create a new component instance.
     */
    public function __construct($pageTitle, $success)
    {
        $this->page_title = $pageTitle;
        $this->success = $success;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.header-component');
    }
}
