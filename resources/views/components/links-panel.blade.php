{{-- Panel: Danh sách liên kết gần đây --}}
<div class="flex flex-col gap-2.5">
    {{-- Header Panel --}}
    <div class="flex items-center justify-between px-1">
        <div class="space-y-0.5">
            <span class="text-[9px] font-black font-outfit uppercase tracking-wider text-indigo-600">Quản lý</span>
            <h3 class="text-base sm:text-lg font-black font-outfit text-slate-900 tracking-tight flex items-center gap-1.5">
                <span class="w-1.5 h-4 bg-indigo-600 rounded-sm"></span>
                Liên kết gần đây
            </h3>
        </div>
        <a href="{{ route('links.index') }}" class="text-[11px] font-bold text-indigo-600 hover:text-indigo-800 transition-colors uppercase tracking-wider flex items-center gap-1 bg-indigo-50 hover:bg-indigo-100/70 px-2.5 py-1 rounded-md">
            <span>Tất cả</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
            </svg>
        </a>
    </div>

    {{-- Search Bar --}}
    <div class="relative group w-full">
        <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-indigo-600 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>
        <input type="text" id="searchLinks" placeholder="Tìm kiếm theo URL hoặc mã tùy chỉnh..."
            class="w-full bg-white/90 backdrop-blur-md shadow-sm border border-slate-200/80 rounded-xl py-2 pl-9 pr-3.5 text-xs font-semibold text-slate-800 outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-50 transition-all placeholder:text-slate-400">
    </div>

    {{-- Danh sách Cards (Do JS Render vào statsBody) --}}
    <div class="glass-card rounded-2xl border border-slate-200/80 shadow-sm relative">
        <div id="statsBody">
            {{-- Skeleton loading rows --}}
            <div class="animate-pulse divide-y divide-slate-100 rounded-2xl overflow-hidden">
                @for ($i = 0; $i < 3; $i++)
                <div class="p-3.5 sm:p-4 flex items-center gap-3">
                    <div class="flex-1 space-y-2">
                        <div class="h-3 bg-slate-200/60 rounded-md w-3/4"></div>
                        <div class="h-2 bg-slate-200/40 rounded-md w-1/2"></div>
                        <div class="flex gap-2 pt-0.5">
                            <div class="h-4 bg-slate-200/50 rounded-md w-16"></div>
                            <div class="h-4 bg-slate-200/50 rounded-md w-12"></div>
                        </div>
                    </div>
                    <div class="w-7 h-7 bg-slate-200/60 rounded-lg shrink-0"></div>
                </div>
                @endfor
            </div>
        </div>
    </div>
</div>