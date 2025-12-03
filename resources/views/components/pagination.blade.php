@if($articles->hasPages())
    <div class="pagination">
    {{-- Первая страница --}}
        @if($articles->onFirstPage())
                    <span class="page-item disabled">
                        <span class="page-link">«</span>
                    </span>
                @else
                    <a class="page-link" href="{{ $articles->url(1) }}" rel="first">«</a>
                @endif

                {{-- Предыдущая страница --}}
                @if($articles->onFirstPage())
                    <span class="page-item disabled">
                        <span class="page-link">‹</span>
                    </span>
                @else
                    <a class="page-link" href="{{ $articles->previousPageUrl() }}" rel="prev">‹</a>
                @endif

                {{-- Номера страниц --}}
                @foreach($articles->getUrlRange(max(1, $articles->currentPage() - 2), min($articles->lastPage(), $articles->currentPage() + 2)) as $page => $url)
                    @if($page == $articles->currentPage())
                        <span class="page-item active">
                            <span class="page-link">{{ $page }}</span>
                        </span>
                    @else
                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach

                {{-- Следующая страница --}}
                @if($articles->hasMorePages())
                    <a class="page-link" href="{{ $articles->nextPageUrl() }}" rel="next">›</a>
                @else
                    <span class="page-item disabled">
                        <span class="page-link">›</span>
                    </span>
                @endif

                {{-- Последняя страница --}}
                @if($articles->currentPage() == $articles->lastPage())
                    <span class="page-item disabled">
                        <span class="page-link">»</span>
                    </span>
                @else
                    <a class="page-link" href="{{ $articles->url($articles->lastPage()) }}" rel="last">»</a>
                @endif
            </div>

            {{-- Информация о страницах --}}
            <div class="pagination-info">
                Показано с {{ $articles->firstItem() }} по {{ $articles->lastItem() }} из {{ $articles->total() }} статей
            </div>
        @endif
    </div>