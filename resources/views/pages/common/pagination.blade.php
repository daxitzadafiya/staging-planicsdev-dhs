<nav class="w-full sm:w-auto sm:mr-auto">
    <ul class="pagination">
        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <a class="page-link" href="javascript:void(0)"> 
                    <i class="w-4 h-4" data-lucide="chevrons-left"></i>
                </a>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}"> 
                    <i class="w-4 h-4" data-lucide="chevrons-left"></i> 
                </a>
            </li>
        @endif

        @foreach ($elements as $element)
            @if(is_string($element))
                <li class="page-item disabled"> 
                    <a class="page-link" href="javascript:void(0)">{{ $element }}</a> 
                </li>
            @else
                @foreach ($element as $pageNumber => $url)
                    <li class="page-item {{ $paginator->currentPage() == $pageNumber ? 'active' : '' }}"> 
                        <a class="page-link" href="{{ $url }}">{{ $pageNumber }}</a> 
                    </li>
                @endforeach
            @endif
        @endforeach
        
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}"> 
                    <i class="w-4 h-4" data-lucide="chevrons-right"></i>
                </a>
            </li>
        @else
            <li class="page-item">
                <a class="page-link disabled" href="javascript:void(0)"> 
                    <i class="w-4 h-4" data-lucide="chevrons-right"></i>
                </a>
            </li>
        @endif
    </ul>
</nav>
<p class="mt-3 sm:mt-0">Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }} of {{ $paginator->total() }} entries</p>
