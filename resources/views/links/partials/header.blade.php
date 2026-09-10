{{-- Header Section --}}
<div class="glass-card rounded-2xl sm:rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-sm mb-6 flex flex-col md:flex-row md:items-center justify-between gap-6 animate-in fade-in duration-500">
    <div class="space-y-3">
        <nav class="flex items-center gap-2 text-[10px] font-black uppercase tracking-wider text-slate-400">
            <a href="/" class="hover:text-indigo-600 transition-colors">Trang chủ</a>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
            <a href="/links" class="hover:text-indigo-600 transition-colors font-black">Liên kết</a>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
            <span class="text-indigo-600 font-black">Chi tiết</span>
        </nav>
        <div class="space-y-1">
            <div class="flex items-center gap-3">
                <span class="px-2.5 py-0.5 bg-indigo-50 text-indigo-600 text-[9px] font-black font-outfit uppercase tracking-widest rounded-full border border-indigo-100">Báo cáo phân tích</span>
                @if(!$link->is_active)
                    <span class="px-2.5 py-0.5 bg-rose-50 border border-rose-200 text-rose-500 text-[9px] font-black uppercase tracking-widest rounded-full shadow-sm">Đã khóa</span>
                @endif
            </div>
            <h1 class="text-2xl sm:text-3xl font-black font-outfit text-slate-900 tracking-tight">Thống kê liên kết</h1>
            
            {{-- Short URL display --}}
            <div class="flex items-center gap-3 pt-1">
                <div class="px-3.5 py-1.5 bg-indigo-50/80 rounded-xl flex items-center gap-2.5 border border-indigo-100/80 group">
                    <a href="{{ url($link->short_code) }}" target="_blank"
                       class="text-indigo-600 font-mono font-bold text-sm sm:text-base hover:text-indigo-800 hover:underline underline-offset-4 decoration-2 break-all">
                        {{ str_replace(['http://', 'https://'], '', url($link->short_code)) }}
                    </a>
                    <button onclick="Utils.copyToClipboard('{{ url($link->short_code) }}', this)"
                            title="Sao chép liên kết"
                            class="shrink-0 text-indigo-400 hover:text-indigo-600 transition-all active:scale-90">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-wrap items-center gap-2.5 shrink-0">
        <button onclick="LinkManager.toggleStatus('{{ $link->short_code }}')"
                class="flex items-center gap-1.5 px-4 py-2.5 rounded-xl border font-bold font-outfit text-xs uppercase tracking-wider transition-all active:scale-95 shadow-sm {{ $link->is_active ? 'bg-white hover:bg-slate-50 text-slate-700 border-slate-200/80' : 'bg-rose-50 text-rose-500 border-rose-200 hover:bg-rose-500 hover:text-white' }}">
            @if($link->is_active)
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                Tạm khóa
            @else
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z" /></svg>
                Mở Khóa
            @endif
        </button>
        
        <button onclick="LinkManager.showQR('{{ url($link->short_code) }}')"
                class="flex items-center gap-1.5 px-4 py-2.5 bg-white hover:bg-slate-50 text-slate-700 font-bold font-outfit text-xs uppercase tracking-wider rounded-xl border border-slate-200/80 shadow-sm transition-all active:scale-95">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm14 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/></svg>
            Mã QR
        </button>

        <button onclick="LinkManager.deleteLink('{{ $link->short_code }}')"
                class="flex items-center gap-1.5 px-4 py-2.5 bg-rose-50 hover:bg-rose-500 text-rose-500 hover:text-white font-bold font-outfit text-xs uppercase tracking-wider rounded-xl border border-rose-100 transition-all active:scale-95 shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
            Xoá
        </button>
    </div>
</div>
