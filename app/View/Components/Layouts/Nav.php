<?php

namespace App\View\Components\Layouts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Nav extends Component
{
    public string $APP_NAME = 'Party Photo';
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->APP_NAME = config('app.name');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layouts.nav');
    }
}
