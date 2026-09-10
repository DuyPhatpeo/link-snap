{{-- Original URL & Short URL Information Card --}}
<div class="glass-card rounded-2xl p-5 sm:p-6 border border-slate-200/80 shadow-sm animate-in fade-in duration-500 delay-200">
    <div class="flex items-center gap-2 mb-4">
        <span class="w-1.5 h-4 bg-indigo-600 rounded-full"></span>
        <h3 class="text-sm font-black font-outfit text-slate-900 tracking-tight">Thông tin liên kết</h3>
    </div>
    <div class="space-y-4">
        <div class="bg-slate-50/80 p-4 rounded-xl border border-slate-200/60">
            <p class="text-[10px] font-black font-outfit uppercase tracking-wider text-slate-400 mb-1.5">Link đích gốc</p>
            <a href="{{ $link->original_url }}" target="_blank"
               class="text-xs sm:text-sm font-semibold text-slate-700 hover:text-indigo-600 transition-colors break-all leading-relaxed flex items-center gap-2 group">
                <span class="truncate">{{ $link->original_url }}</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-slate-400 group-hover:text-indigo-600 shrink-0 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
            </a>
        </div>
        <div class="bg-indigo-50/50 p-4 rounded-xl border border-indigo-100/60">
            <p class="text-[10px] font-black font-outfit uppercase tracking-wider text-indigo-600 mb-1.5">Link rút gọn</p>
            <a href="{{ url($link->short_code) }}" target="_blank"
               class="text-sm sm:text-base font-bold font-mono text-indigo-600 hover:text-indigo-800 hover:underline underline-offset-4 decoration-2 break-all">
                {{ url($link->short_code) }}
            </a>
        </div>
    </div>
</div>
