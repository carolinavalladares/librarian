<?php

namespace App\View\Components;

use App\Http\Resources\StudentResource;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StudentItem extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public StudentResource $student
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.student-item');
    }
}