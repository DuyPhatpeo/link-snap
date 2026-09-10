{{-- Header Section: Unified Identity & Quick Actions --}}
<div class="glass-card rounded-2xl p-5 sm:p-7 border border-slate-200/80 shadow-sm mb-6 animate-in fade-in duration-500">
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-5">
        
        {{-- Left Info: Breadcrumb, Title & URLs --}}
        <div class="space-y-3 min-w-0 flex-1">
            <div class="flex flex-wrap items-center gap-2">
                <nav class="flex items-center gap-1.5 text-[10px] font-black uppercase tracking-wider text-slate-400">
                    <a href="/" class="hover:text-indigo-600 transition-colors">Trang chủ</a>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                    <a href="/links" class="hover:text-indigo-600 transition-colors font-bold">Liên kết</a>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                    <span class="text-indigo-600 font-black">Chi tiết</span>
                </nav>
                <span class="text-slate-300">&bull;</span>
                <div class="flex items-center gap-2">
                    <span class="px-2.5 py-0.5 bg-indigo-50 text-indigo-600 text-[9px] font-black font-outfit uppercase tracking-widest rounded-md border border-indigo-100">Báo cáo phân tích</span>
                    @if(!$link->is_active)
                        <span class="px-2 py-0.5 bg-rose-50 border border-rose-200 text-rose-500 text-[9px] font-black uppercase tracking-widest rounded-md shadow-2xs">Đã khóa</span>
                    @else
                        <span class="px-2 py-0.5 bg-emerald-50 border border-emerald-100 text-emerald-600 text-[9px] font-black uppercase tracking-widest rounded-md flex items-center gap-1">
                            <span class="w-1.5 h-1.5 rounded-sm bg-emerald-500"></span>
                            Hoạt động
                        </span>
                    @endif
                </div>
            </div>

            {{-- Short URL Primary Pill --}}
            <div class="flex flex-wrap items-center gap-2.5 pt-0.5">
                <div class="inline-flex items-center bg-indigo-50/80 border border-indigo-100 rounded-xl px-3 py-1.5 gap-2 max-w-full">
                    <span class="text-[10px] font-black font-outfit uppercase tracking-widest text-indigo-400 shrink-0">Link rút gọn:</span>
                    <a href="{{ url($link->short_code) }}" target="_blank"
                       class="text-indigo-600 font-mono font-bold text-sm sm:text-base hover:text-indigo-800 hover:underline underline-offset-4 truncate"
                       title="Mở liên kết rút gọn">
                        {{ str_replace(['http://', 'https://'], '', url($link->short_code)) }}
                    </a>
                    <button onclick="Utils.copyToClipboard('{{ url($link->short_code) }}', this)"
                            title="Sao chép link rút gọn"
                            class="shrink-0 p-1 text-indigo-500 hover:text-indigo-700 hover:bg-indigo-100/50 rounded-lg transition-all active:scale-90 ml-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                    </button>
                    <a href="{{ url($link->short_code) }}" target="_blank"
                       title="Mở trong tab mới"
                       class="shrink-0 p-1 text-indigo-400 hover:text-indigo-600 rounded-lg transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    </a>
                </div>
            </div>

            {{-- Original Destination Link --}}
            <div class="flex items-center gap-2 text-xs text-slate-500 min-w-0">
                <span class="text-[10px] font-black font-outfit uppercase tracking-widest text-slate-400 shrink-0">Đích đến:</span>
                <a href="{{ $link->original_url }}" target="_blank"
                   class="truncate font-medium text-slate-600 hover:text-indigo-600 transition-colors flex items-center gap-1 group/orig"
                   title="{{ $link->original_url }}">
                    <span class="truncate">{{ $link->original_url }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 shrink-0 text-slate-400 group-hover/orig:text-indigo-600 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                </a>
            </div>
        </div>

        {{-- Right Actions Toolbar --}}
        <div class="flex items-center gap-2 shrink-0 border-t lg:border-t-0 pt-3 lg:pt-0 border-slate-100">
            <button onclick="LinkManager.toggleStatus('{{ $link->short_code }}')"
                    class="flex items-center gap-1.5 px-4 py-2.5 rounded-xl border font-bold font-outfit text-xs uppercase tracking-wider transition-all active:scale-95 shadow-sm {{ $link->is_active ? 'bg-white hover:bg-slate-50 text-slate-700 border-slate-200/80' : 'bg-rose-50 text-rose-500 border-rose-200 hover:bg-rose-500 hover:text-white' }}">
                @if($link->is_active)
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                    <span>Tạm khóa</span>
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z" /></svg>
                    <span>Mở khóa</span>
                @endif
            </button>
            
            <button onclick="LinkManager.showQR('{{ url($link->short_code) }}')"
                    class="flex items-center gap-1.5 px-4 py-2.5 bg-white hover:bg-slate-50 text-slate-700 font-bold font-outfit text-xs uppercase tracking-wider rounded-xl border border-slate-200/80 shadow-sm transition-all active:scale-95">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm14 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/></svg>
                <span>Mã QR</span>
            </button>

            <button onclick="LinkManager.deleteLink('{{ $link->short_code }}')"
                    class="flex items-center gap-1.5 px-3.5 py-2.5 bg-rose-50 hover:bg-rose-500 text-rose-500 hover:text-white font-bold font-outfit text-xs uppercase tracking-wider rounded-xl border border-rose-100 transition-all active:scale-95 shadow-sm"
                    title="Xóa liên kết này">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                <span class="hidden sm:inline">Xóa</span>
            </button>
        </div>

    </div>
</div>
