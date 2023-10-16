@if ($paginator->hasPages())
    <nav>
        <ul class="pagination flex items-center justify-start gap-2 text-sm">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled cursor-default" aria-disabled="true"><span>@lang('pagination.previous')</span></li>
            @else
                <li><a class="hover:text-orange-500 transition-colors duration-200" href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a></li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li><a class="hover:text-orange-500 transition-colors duration-200" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a></li>
            @else
                <li class="disabled cursor-default" aria-disabled="true"><span>@lang('pagination.next')</span></li>
            @endif
        </ul>
    </nav>
@endif
