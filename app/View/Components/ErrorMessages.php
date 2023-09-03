<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\ViewErrorBag;
use Illuminate\View\Component;

class ErrorMessages extends Component
{

    /**
     * Create a new component instance.
     */
    public function __construct(public ViewErrorBag  $errors) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.error-messages');
    }

    public function has2MoreErrors(): bool
    {
        return $this->errors->count() > 2;
    }
}
