<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BookItem extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public int $id,
        public string $title,
        public string $author,
        public string $available,
        public string $borrowed,
        public string $coverImage
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.book-item');
    }
}