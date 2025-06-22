@if ($paginator->hasPages())
    <ul class="pagination" style="justify-content: center; padding: 0; margin: 20px 0;">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled" aria-disabled="true"><span style="padding: 0.5rem 0.75rem; font-size: 0.875rem;">&laquo;</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev" style="padding: 0.5rem 0.75rem; font-size: 0.875rem;">&laquo;</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled" aria-disabled="true"><span style="padding: 0.5rem 0.75rem; font-size: 0.875rem;">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active" aria-current="page"><span style="padding: 0.5rem 0.75rem; font-size: 0.875rem;">{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}" style="padding: 0.5rem 0.75rem; font-size: 0.875rem;">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next" style="padding: 0.5rem 0.75rem; font-size: 0.875rem;">&raquo;</a></li>
        @else
            <li class="disabled" aria-disabled="true"><span style="padding: 0.5rem 0.75rem; font-size: 0.875rem;">&raquo;</span></li>
        @endif
    </ul>
@endif
