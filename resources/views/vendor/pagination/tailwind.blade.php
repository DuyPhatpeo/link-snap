@if ($paginator->hasPages())
<nav role="navigation" aria-label="Pagination Navigation" class="flex flex-col sm:flex-row items-center justify-between gap-4">

    {{-- Info text --}}
    <div class="text-[10px] font-black uppercase tracking-widest text-slate-400">
        Hiển thị
        <span class="text-slate-600">{{ $paginator->firstItem() }}</span>
        –
        <span class="text-slate-600">{{ $paginator->lastItem() }}</span>
        trong tổng số
        <span class="text-slate-600">{{ $paginator->total() }}</span>
        liên kết
    </div>

    {{-- Page buttons --}}
    <div class="flex items-center gap-1.5">

        {{-- Previous --}}
        @if ($paginator->onFirstPage())
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-slate-50 text-slate-300 border border-slate-200 cursor-not-allowed">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}"
               class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-white text-slate-600 border border-slate-200 hover:border-indigo-400 hover:text-indigo-600 transition-all shadow-sm active:scale-95">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
            </a>
        @endif

        {{-- Page Numbers --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="inline-flex items-center justify-center w-10 h-10 text-slate-400 text-xs font-bold">···</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span aria-current="page"
                              class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-indigo-600 text-white font-black text-xs shadow-md shadow-indigo-500/20 border border-indigo-600">
                            {{ $page }}
                        </span>
                    @else
                        <a href="{{ $url }}"
                           class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-white text-slate-600 font-bold text-xs border border-slate-200 hover:border-indigo-400 hover:text-indigo-600 transition-all shadow-sm active:scale-95">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}"
               class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-white text-slate-600 border border-slate-200 hover:border-indigo-400 hover:text-indigo-600 transition-all shadow-sm active:scale-95">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
            </a>
        @else
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-slate-50 text-slate-300 border border-slate-200 cursor-not-allowed">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
            </span>
        @endif
    </div>
</nav>
@endif
