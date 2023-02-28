@if($paginator->hasPages())
<div class="row">
    <div class="col-lg-3 text-left">
        Page {{ $paginator->currentPage() }} of {{ $paginator->lastPage() }}
    </div>
    <div class="col-lg-9 text-center">
        {{-- Previous Page Link --}}
        @if($paginator->onFirstPage())
            <button class="btn btn-primary" disabled>Previous</button>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="previous"><button class="btn btn-primary">Previous</button></a>
        @endif
        {{-- Pagination elements --}}
        @foreach($elements as $element)
            {{-- Three dot separator --}}
            @if(is_string($element))
                <button class="btn btn-primary">{{ $element }}</button>
            @endif

            {{-- Array of Links --}}
            @if(is_array($elements))
                @foreach($element as $page => $url)
                    @if($page == $paginator->currentPage())
                        <button class="btn btn-primary active">{{ $page }}</button>
                    @else
                        <a href="{{ $url }}"><button class="btn btn-primary">{{ $page }}</button></a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="previous"><button class="btn btn-primary">Next</button></a>
        @else
            <button class="btn btn-primary" disabled>Next</button>
        @endif
    </div>
</div>
@endif