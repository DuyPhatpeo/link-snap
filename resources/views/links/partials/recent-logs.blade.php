{{-- Recent Activity Logs Column --}}
<div class="space-y-4 animate-in fade-in duration-500 delay-300">
    <div class="glass-card rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden sticky top-20">
        <div class="px-5 py-4 border-b border-slate-100 flex items-center justify-between bg-white/40">
            <div>
                <div class="flex items-center gap-1.5 mb-0.5">
                    <span class="w-1.5 h-3.5 bg-emerald-500 rounded-full"></span>
                    <h3 class="font-outfit text-sm font-black text-slate-900 tracking-tight">Nhật ký truy cập</h3>
                </div>
                <p class="text-[9px] font-bold uppercase tracking-wider text-slate-400 ml-3">{{ count($logs) }} lượt click gần nhất</p>
            </div>
            <div class="flex items-center gap-1 px-2 py-0.5 bg-emerald-50 border border-emerald-100/80 rounded-full">
                <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full animate-pulse"></span>
                <span class="text-[9px] font-bold text-emerald-700 font-outfit">Live</span>
            </div>
        </div>

        <div class="overflow-y-auto max-h-[460px] divide-y divide-slate-100/80 scrollbar-hide">
            @forelse($logs as $log)
            @php
                $osIcons = ['Windows'=>'🪟','MacOS'=>'🍎','Linux'=>'🐧','Android'=>'🤖','iOS'=>'📱'];
                $bIcons = ['Chrome'=>'🌐','Firefox'=>'🦊','Safari'=>'🧭','Edge'=>'🔷','Opera'=>'🎭'];
                $osIcon = $osIcons[$log['os']] ?? '💻';
                $bIcon = $bIcons[$log['browser']] ?? '🌍';
            @endphp
            <div class="px-5 py-3.5 hover:bg-indigo-50/20 transition-all duration-200 group">
                <div class="flex items-center justify-between gap-3 mb-2">
                    <span class="text-[10px] font-mono font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-lg border border-emerald-100/80">
                        {{ $log['ip'] }}
                    </span>
                    <span class="text-[9px] font-medium font-mono text-slate-400 whitespace-nowrap">{{ $log['created_at'] }}</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-[10px] font-bold text-slate-600 bg-slate-50 border border-slate-200/60 px-2 py-0.5 rounded-lg shadow-2xs flex items-center gap-1.5">
                        {{ $osIcon }} {{ $log['os'] }}
                    </span>
                    <span class="text-[10px] font-bold text-slate-600 bg-slate-50 border border-slate-200/60 px-2 py-0.5 rounded-lg shadow-2xs flex items-center gap-1.5">
                        {{ $bIcon }} {{ $log['browser'] }}
                    </span>
                </div>
            </div>
            @empty
            <div class="py-16 text-center px-6">
                <div class="w-12 h-12 bg-slate-100 rounded-2xl flex items-center justify-center mx-auto mb-3 text-slate-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                </div>
                <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Chưa có lượt truy cập nào</p>
            </div>
            @endforelse
        </div>

        <div class="p-3.5 bg-slate-50/50 border-t border-slate-100 text-center">
            <p class="text-[9px] font-bold font-outfit uppercase tracking-wider text-slate-400">Dữ liệu được cập nhật tự động</p>
        </div>
    </div>
</div>
