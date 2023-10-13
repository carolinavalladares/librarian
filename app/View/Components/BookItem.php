<?php

namespace App\View\Components;

use App\Http\Resources\BookResource;
use Closure;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class BookItem extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public BookResource $book
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