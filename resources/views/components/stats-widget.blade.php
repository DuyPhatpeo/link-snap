{{-- Widget Thống Kê Hiện Đại: Bento-Grid + Biểu đồ 14 ngày --}}

{{-- Skeleton loading (hiển thị khi đang nạp dữ liệu từ API) --}}
<div id="statsWidgetSkeleton" class="w-full">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 animate-pulse">
        <div class="h-32 bg-slate-200/50 rounded-2xl"></div>
        <div class="h-32 bg-slate-200/50 rounded-2xl"></div>
        <div class="h-32 md:h-auto md:row-span-1 bg-slate-200/50 rounded-2xl"></div>
    </div>
</div>

{{-- Widget Dữ liệu thực tế --}}
<div id="statsWidget" class="hidden w-full">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
        
        {{-- Card 1: Tổng số liên kết --}}
        <div class="glass-card rounded-2xl p-4 sm:p-5 border border-slate-200/80 relative overflow-hidden group hover:border-indigo-300 transition-all duration-300">
            <div class="flex items-center justify-between mb-2">
                <span class="text-[10px] font-black font-outfit uppercase tracking-wider text-indigo-600">Tổng liên kết</span>
                <div class="w-8 h-8 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.826a4 4 0 015.656 0l4 4a4 4 0 01-5.656 5.656l-1.1-1.1" />
                    </svg>
                </div>
            </div>
            <div class="flex items-baseline gap-2">
                <div id="statTotalLinks" class="text-2xl sm:text-3xl font-black font-outfit text-slate-900 tracking-tight tabular-nums">—</div>
                <div id="statTodayLinks" class="text-[11px] font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-md">
                    <span>+0 hôm nay</span>
                </div>
            </div>
            <p class="text-[10px] text-slate-400 mt-1 font-medium">Liên kết đang hoạt động trong workspace</p>
        </div>

        {{-- Card 2: Tổng lượt Click --}}
        <div class="glass-card rounded-2xl p-4 sm:p-5 border border-slate-200/80 relative overflow-hidden group hover:border-violet-300 transition-all duration-300">
            <div class="flex items-center justify-between mb-2">
                <span class="text-[10px] font-black font-outfit uppercase tracking-wider text-violet-600">Lượt Click</span>
                <div class="w-8 h-8 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                    </svg>
                </div>
            </div>
            <div class="flex items-baseline gap-2">
                <div id="statTotalClicks" class="text-2xl sm:text-3xl font-black font-outfit text-slate-900 tracking-tight tabular-nums">—</div>
                <div id="statTodayClicks" class="text-[11px] font-bold text-violet-600 bg-violet-50 px-2 py-0.5 rounded-md">
                    <span>+0 hôm nay</span>
                </div>
            </div>
            <p class="text-[10px] text-slate-400 mt-1 font-medium">Tổng số tương tác người dùng</p>
        </div>

        {{-- Card 3: Biểu đồ Analytics 14 ngày gần nhất --}}
        <div class="glass-card rounded-2xl p-4 sm:p-5 border border-slate-200/80 flex flex-col justify-between hover:border-cyan-300 transition-all duration-300">
            <div class="flex items-center justify-between mb-1.5">
                <span class="text-[10px] font-black font-outfit uppercase tracking-wider text-slate-700">Xu hướng truy cập (14 ngày)</span>
                <span class="text-[9px] font-bold text-cyan-600 bg-cyan-50 px-2 py-0.5 rounded-md">Trực tiếp</span>
            </div>
            <div class="w-full h-20 relative mt-1">
                <canvas id="clicksChart" class="w-full h-full"></canvas>
            </div>
        </div>

    </div>
</div>
