{{-- Panel: Hoạt động gần đây (Logs) --}}
<div class="flex flex-col gap-2.5">
    {{-- Header Panel --}}
    <div class="flex items-center justify-between px-1">
        <div class="space-y-0.5">
            <span class="text-[9px] font-black font-outfit uppercase tracking-wider text-emerald-600">Thời gian thực</span>
            <h3 class="text-base sm:text-lg font-black font-outfit text-slate-900 tracking-tight flex items-center gap-1.5">
                <span class="w-1.5 h-4 bg-emerald-500 rounded-full"></span>
                Lưu lượng truy cập
            </h3>
        </div>
        <div class="flex items-center gap-1.5 px-2.5 py-0.5 bg-emerald-50 border border-emerald-100/80 rounded-full">
            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
            <span class="text-[10px] font-bold text-emerald-700">Live Stream</span>
        </div>
    </div>

    {{-- Thẻ container chứa log entries --}}
    <div class="glass-card rounded-2xl border border-slate-200/80 overflow-hidden shadow-sm">
        <div id="logsBody">
            {{-- Skeleton loading rows --}}
            <div class="animate-pulse divide-y divide-slate-100">
                @for ($i = 0; $i < 4; $i++)
                <div class="p-3.5 sm:p-4 flex items-start gap-3">
                    <div class="w-8 h-8 bg-slate-200/60 rounded-xl shrink-0 mt-0.5"></div>
                    <div class="flex-1 space-y-2">
                        <div class="h-3 bg-slate-200/60 rounded-full w-4/5"></div>
                        <div class="h-2 bg-slate-200/40 rounded-full w-1/3"></div>
                        <div class="flex gap-2 pt-0.5">
                            <div class="h-4 bg-slate-200/50 rounded-md w-14"></div>
                            <div class="h-4 bg-slate-200/50 rounded-md w-16"></div>
                        </div>
                    </div>
                    <div class="h-3.5 bg-slate-200/50 rounded-full w-12 shrink-0"></div>
                </div>
                @endfor
            </div>
        </div>
    </div>
</div>