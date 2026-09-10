{{-- Metrics Overview Cards --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-3.5 sm:gap-4 mb-6 animate-in fade-in duration-500 delay-100">
    {{-- Tổng click --}}
    <div class="glass-card rounded-2xl p-4 sm:p-5 border border-slate-200/80 shadow-sm hover:border-indigo-200 transition-all">
        <div class="flex items-center gap-3.5">
            <div class="w-11 h-11 bg-indigo-50 text-indigo-600 rounded-xl flex items-center justify-center shrink-0 shadow-sm border border-indigo-100/60">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.042 21.672 13.684 16.6m0 0-2.51 2.225.569-9.47 5.227 7.917-3.286-.672ZM12 2.25V4.5m5.834.166-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243-1.59-1.59" /></svg>
            </div>
            <div class="min-w-0">
                <div class="font-outfit text-xl sm:text-2xl font-black text-slate-900 tracking-tight tabular-nums truncate">{{ number_format($link->clicks) }}</div>
                <div class="text-[10px] font-black font-outfit uppercase tracking-wider text-indigo-600 truncate">Tổng click</div>
            </div>
        </div>
    </div>

    {{-- Click hôm nay --}}
    <div class="glass-card rounded-2xl p-4 sm:p-5 border border-slate-200/80 shadow-sm hover:border-emerald-200 transition-all">
        <div class="flex items-center gap-3.5">
            <div class="w-11 h-11 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center shrink-0 shadow-sm border border-emerald-100/60">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
            </div>
            <div class="min-w-0">
                <div class="font-outfit text-xl sm:text-2xl font-black text-slate-900 tracking-tight tabular-nums truncate">{{ number_format($clicksToday) }}</div>
                <div class="text-[10px] font-black font-outfit uppercase tracking-wider text-emerald-600 truncate">Hôm nay</div>
            </div>
        </div>
    </div>

    {{-- Unique visitors --}}
    <div class="glass-card rounded-2xl p-4 sm:p-5 border border-slate-200/80 shadow-sm hover:border-violet-200 transition-all">
        <div class="flex items-center gap-3.5">
            <div class="w-11 h-11 bg-violet-50 text-violet-600 rounded-xl flex items-center justify-center shrink-0 shadow-sm border border-violet-100/60">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            </div>
            <div class="min-w-0">
                <div class="font-outfit text-xl sm:text-2xl font-black text-slate-900 tracking-tight tabular-nums truncate">{{ number_format($uniqueVisitors) }}</div>
                <div class="text-[10px] font-black font-outfit uppercase tracking-wider text-violet-600 truncate">IP Duy nhất</div>
            </div>
        </div>
    </div>

    {{-- Create Date --}}
    <div class="glass-card rounded-2xl p-4 sm:p-5 border border-slate-200/80 shadow-sm hover:border-slate-300 transition-all">
        <div class="flex items-center gap-3.5">
            <div class="w-11 h-11 bg-slate-100 text-slate-700 rounded-xl flex items-center justify-center shrink-0 shadow-sm border border-slate-200/60">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </div>
            <div class="min-w-0">
                <div class="font-mono text-sm sm:text-base font-bold text-slate-900 tracking-tight truncate">{{ $link->created_at->format('d/m/Y') }}</div>
                <div class="text-[9px] font-bold uppercase tracking-wider text-slate-400 mt-0.5 truncate">{{ $link->created_at->diffForHumans() }}</div>
            </div>
        </div>
    </div>
</div>
