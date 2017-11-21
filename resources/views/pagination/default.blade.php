@if ($paginator->hasPages())
    <ul class="pager">

        @if ($paginator->onFirstPage())
            <li class="previous disabled">
                <a href="#">&larr; Older</a>
            </li>
        @else
            <li class="previous">
                <a href="{{ $paginator->previousPageUrl() }}">&larr; Older</a>
            </li>
        @endif

        @if ($paginator->hasMorePages())
            <li class="next">
                <a href="{{ $paginator->nextPageUrl() }}">Newer &rarr;</a>
            </li>
        @else
            <li class="next disabled">
                <a href="#">Newer &rarr;</a>
            </li>
        @endif

    </ul>
@endif