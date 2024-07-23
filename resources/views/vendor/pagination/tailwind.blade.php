<!-- resources/views/vendor/pagination/tailwind.blade.php -->
@if ($paginator->hasPages())
    <div class="flex flex-col items-center">
        <div class="flex flex-col items-center">
            <!-- Teks bantuan -->
            <span class="text-sm text-black">
                Menampilkan <span class="font-semibold text-black">{{ $paginator->firstItem() }}</span> hingga <span class="font-semibold text-black">{{ $paginator->lastItem() }}</span> dari <span class="font-semibold text-black">{{ $paginator->total() }}</span> Entri
            </span>
        </div>
        <br>
        <nav aria-label="Navigasi halaman contoh">
            <ul class="inline-flex -space-x-px text-sm">
                @if ($paginator->onFirstPage())
                    <li aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <span class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">@lang('pagination.previous')</span>
                    </li>
                @else
                    <li>
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" aria-label="@lang('pagination.previous')">@lang('pagination.previous')</a>
                    </li>
                @endif

                @foreach ($elements as $element)
                    @if (is_string($element))
                        <li aria-disabled="true"><span class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">{{ $element }}</span></li>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li aria-current="page"><span class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 dark:border-gray-700 dark:bg-gray-700 dark:text-white">{{ $page }}</span></li>
                            @else
                                <li><a href="{{ $url }}" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                @if ($paginator->hasMorePages())
                    <li>
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" aria-label="@lang('pagination.next')">@lang('pagination.next')</a>
                    </li>
                @else
                    <li aria-disabled="true" aria-label="@lang('pagination.next')">
                        <span class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">@lang('pagination.next')</span>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
@endif
