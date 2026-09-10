{{-- OS & Browser Distribution Row --}}
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-5 animate-in fade-in duration-500 delay-500 pb-8">
    {{-- OS Distribution --}}
    <div class="glass-card rounded-2xl p-5 sm:p-6 border border-slate-200/80 shadow-sm">
        <div class="flex items-center gap-2 mb-1">
            <span class="w-1.5 h-4 bg-indigo-600 rounded-full"></span>
            <h3 class="text-sm font-black font-outfit text-slate-900 tracking-tight">Hệ điều hành</h3>
        </div>
        <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-5 ml-3.5">Phân bố thiết bị truy cập</p>
        @if(count($osDist) > 0)
            @php $total = array_sum($osDist); @endphp
            <div class="space-y-4">
                @foreach($osDist as $os => $count)
                @php
                    $pct = $total > 0 ? round($count / $total * 100) : 0;
                    $osIcons = ['Windows'=>'🪟','MacOS'=>'🍎','Linux'=>'🐧','Android'=>'🤖','iOS'=>'📱'];
                    $icon = $osIcons[$os] ?? '💻';
                    $colors = ['Windows'=>'bg-indigo-600','MacOS'=>'bg-slate-700','Linux'=>'bg-amber-500','Android'=>'bg-emerald-500','iOS'=>'bg-violet-500'];
                    $bar = $colors[$os] ?? 'bg-slate-400';
                @endphp
                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <span class="text-xs font-bold text-slate-700 flex items-center gap-2">{{ $icon }} {{ $os }}</span>
                        <span class="text-[10px] font-bold font-mono text-slate-400">{{ $count }} ({{ $pct }}%)</span>
                    </div>
                    <div class="h-2 bg-slate-100 rounded-full overflow-hidden">
                        <div class="{{ $bar }} h-full rounded-full transition-all duration-1000 ease-out shadow-sm" @style(['width' => $pct . '%'])></div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="py-10 text-center text-slate-300 text-xs font-bold uppercase tracking-wider italic">Chưa có dữ liệu thống kê</div>
        @endif
    </div>

    {{-- Browser Distribution --}}
    <div class="glass-card rounded-2xl p-5 sm:p-6 border border-slate-200/80 shadow-sm">
        <div class="flex items-center gap-2 mb-1">
            <span class="w-1.5 h-4 bg-violet-600 rounded-full"></span>
            <h3 class="text-sm font-black font-outfit text-slate-900 tracking-tight">Trình duyệt</h3>
        </div>
        <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-5 ml-3.5">Phân bố trình duyệt web</p>
        @if(count($browserDist) > 0)
            @php $total = array_sum($browserDist); @endphp
            <div class="space-y-4">
                @foreach($browserDist as $browser => $count)
                @php
                    $pct = $total > 0 ? round($count / $total * 100) : 0;
                    $bIcons = ['Chrome'=>'🌐','Firefox'=>'🦊','Safari'=>'🧭','Edge'=>'🔷','Opera'=>'🎭'];
                    $icon = $bIcons[$browser] ?? '🌍';
                    $bColors = ['Chrome'=>'bg-indigo-600','Firefox'=>'bg-orange-500','Safari'=>'bg-sky-500','Edge'=>'bg-violet-500','Opera'=>'bg-red-500'];
                    $bar = $bColors[$browser] ?? 'bg-slate-400';
                @endphp
                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <span class="text-xs font-bold text-slate-700 flex items-center gap-2">{{ $icon }} {{ $browser }}</span>
                        <span class="text-[10px] font-bold font-mono text-slate-400">{{ $count }} ({{ $pct }}%)</span>
                    </div>
                    <div class="h-2 bg-slate-100 rounded-full overflow-hidden">
                        <div class="{{ $bar }} h-full rounded-full transition-all duration-1000 ease-out shadow-sm" @style(['width' => $pct . '%'])></div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="py-10 text-center text-slate-300 text-xs font-bold uppercase tracking-wider italic">Chưa có dữ liệu thống kê</div>
        @endif
    </div>
</div>
