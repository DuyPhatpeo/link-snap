{{-- Click Analytics Area Chart Card --}}
<div class="glass-card rounded-2xl p-5 sm:p-6 border border-slate-200/80 shadow-sm animate-in fade-in duration-500 delay-400">
    <div class="flex items-center justify-between mb-6">
        <div>
            <div class="flex items-center gap-2 mb-1">
                <span class="w-1.5 h-4 bg-indigo-600 rounded-sm"></span>
                <h3 class="text-sm sm:text-base font-black font-outfit text-slate-900 tracking-tight">Xu hướng truy cập</h3>
            </div>
            <p class="text-[10px] font-black font-outfit uppercase tracking-wider text-slate-400 ml-3.5">14 ngày gần nhất</p>
        </div>
        <div class="flex items-center gap-2 bg-indigo-50/80 px-2.5 py-1 rounded-md border border-indigo-100/80">
            <span class="w-1.5 h-1.5 bg-indigo-600 rounded-sm shadow-[0_0_8px_rgba(79,70,229,0.5)] animate-pulse"></span>
            <span class="text-[9px] font-black uppercase tracking-wider text-indigo-700">Thời gian thực</span>
        </div>
    </div>
    <div class="h-64 sm:h-72 w-full">
        <canvas id="linkClicksChart"></canvas>
    </div>
</div>
