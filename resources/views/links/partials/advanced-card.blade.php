{{-- Advanced Configuration & Protection Widget (Sidebar Optimized) --}}
<div class="glass-card rounded-2xl p-5 border border-slate-200/80 shadow-sm animate-in fade-in duration-500 delay-200 space-y-4">
    <div class="flex items-center justify-between border-b border-slate-100 pb-3">
        <div class="flex items-center gap-2">
            <span class="w-1.5 h-3.5 bg-indigo-600 rounded-sm"></span>
            <h3 class="text-sm font-black font-outfit text-slate-900 tracking-tight">Cấu hình & Bảo vệ</h3>
        </div>
        <span class="text-[9px] font-bold uppercase tracking-wider text-slate-400 bg-slate-100 px-2 py-0.5 rounded-md">Thiết lập</span>
    </div>

    {{-- Mật khẩu bảo vệ --}}
    @php
        $hasPwd = !empty($link->password);
        $decryptedPwd = '';
        if ($hasPwd) {
            try {
                $decryptedPwd = \Illuminate\Support\Facades\Crypt::decryptString($link->password);
            } catch (\Exception $e) {
                $decryptedPwd = '[Đã mã hóa]';
            }
        }
    @endphp
    <div class="bg-slate-50/80 p-3.5 rounded-xl border border-slate-200/60">
        <div class="flex items-center justify-between mb-2">
            <span class="text-[10px] font-black font-outfit uppercase tracking-wider text-slate-500 flex items-center gap-1.5">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                Mật khẩu truy cập
            </span>
            @if($hasPwd)
                <span class="text-[9px] font-bold text-emerald-600 bg-emerald-50 px-1.5 py-0.5 rounded">Đã bật</span>
            @else
                <span class="text-[9px] font-bold text-slate-400 bg-slate-100 px-1.5 py-0.5 rounded">Chưa đặt</span>
            @endif
        </div>

        @if($hasPwd)
            <div class="flex items-center gap-1.5">
                <form id="pwdUpdateForm" onsubmit="LinkApi.updatePwd(event, '{{ $link->short_code }}')" class="relative flex-1" style="display:none;">
                    @csrf
                    <input type="text" name="password" placeholder="Mật khẩu mới (hoặc để trống để xóa)" class="w-full bg-white border border-indigo-500 rounded-lg text-xs font-bold text-slate-700 px-2.5 py-1.5 pr-12 outline-none">
                    <button type="submit" class="absolute right-1 top-1 bottom-1 px-2 bg-indigo-600 hover:bg-indigo-700 text-white text-[9px] font-bold uppercase rounded transition-all">Lưu</button>
                </form>
                <div id="pwdDisplayArea" class="relative flex-1">
                    <input type="password" id="displayPassword" value="{{ $decryptedPwd }}" readonly class="w-full bg-white border border-slate-200/80 rounded-lg text-xs font-mono font-bold text-indigo-600 px-2.5 py-1.5 pr-7 outline-none cursor-pointer select-all" onclick="this.select()" title="Bấm để sao chép">
                    <button type="button" onclick="const p=document.getElementById('displayPassword'); p.type=p.type==='password'?'text':'password'; this.classList.toggle('text-indigo-600')" class="absolute right-2 top-1/2 -translate-y-1/2 text-slate-400 hover:text-indigo-600 p-0.5" title="Hiện mật khẩu">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                    </button>
                </div>
                <button type="button" id="pwdEditBtn" onclick="document.getElementById('pwdDisplayArea').style.display='none'; document.getElementById('pwdUpdateForm').style.display='block'; this.style.display='none';" class="p-1.5 bg-white text-slate-400 hover:text-indigo-600 border border-slate-200/80 rounded-lg transition-all" title="Đổi mật khẩu">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg>
                </button>
            </div>
        @else
            <form onsubmit="LinkApi.updatePwd(event, '{{ $link->short_code }}')" class="relative flex items-center">
                @csrf
                <input type="text" name="password" placeholder="Nhập để đặt mật khẩu..." class="w-full bg-white border border-slate-200 rounded-lg text-xs font-semibold text-slate-700 px-2.5 py-1.5 pr-12 focus:border-indigo-500 outline-none transition-all">
                <button type="submit" class="absolute right-1 top-1 bottom-1 px-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-[9px] font-bold uppercase rounded transition-all">Đặt</button>
            </form>
        @endif
    </div>

    {{-- Hạn sử dụng & Giới hạn click --}}
    @if($link->expires_at || $link->click_limit)
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
        @if($link->expires_at)
        <div class="bg-slate-50/80 p-3 rounded-xl border border-slate-200/60">
            <span class="text-[9px] font-black font-outfit uppercase tracking-wider text-slate-400 flex items-center gap-1 mb-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                Thời hạn
            </span>
            <p class="text-xs font-mono font-bold {{ $link->expires_at->isPast() ? 'text-rose-500' : 'text-slate-800' }}">
                {{ $link->expires_at->format('H:i d/m/Y') }}
            </p>
            @if($link->expires_at->isPast())
                <span class="inline-block text-[8px] font-black text-rose-500 uppercase mt-0.5">Đã hết hạn</span>
            @endif
        </div>
        @endif

        @if($link->click_limit)
        <div class="bg-slate-50/80 p-3 rounded-xl border border-slate-200/60">
            <span class="text-[9px] font-black font-outfit uppercase tracking-wider text-slate-400 flex items-center gap-1 mb-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15.042 21.672 13.684 16.6m0 0-2.51 2.225.569-9.47 5.227 7.917-3.286-.672ZM12 2.25V4.5m5.834.166-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243-1.59-1.59" /></svg>
                Giới hạn Click
            </span>
            <p class="text-xs font-outfit font-bold text-slate-800">
                {{ number_format($link->clicks) }} / {{ number_format($link->click_limit) }}
            </p>
            @php
                $clickPct = min(100, round(($link->clicks / max(1, $link->click_limit)) * 100));
            @endphp
            <div class="w-full bg-slate-200 h-1.5 rounded-md mt-1.5 overflow-hidden">
                <div class="bg-emerald-500 h-full rounded-md transition-all duration-700" data-pct="{{ $clickPct }}" style="width: 0%;"></div>
            </div>
        </div>
        @endif
    </div>
    @endif

    {{-- Thẻ xem trước mạng xã hội (OpenGraph Card) --}}
    @if($link->title || $link->description || $link->thumbnail)
    <div class="bg-slate-50/80 p-3 rounded-xl border border-slate-200/60">
        <span class="text-[9px] font-black font-outfit uppercase tracking-wider text-slate-400 flex items-center gap-1 mb-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
            Thẻ xem trước (OpenGraph)
        </span>
        <div class="flex gap-2.5 items-start">
            @if($link->thumbnail)
                <img src="{{ $link->thumbnail }}" alt="Thumbnail" class="w-12 h-12 object-cover rounded-lg border border-slate-200 shrink-0">
            @endif
            <div class="min-w-0 flex-1">
                @if($link->title)<h4 class="text-xs font-bold text-slate-800 truncate">{{ $link->title }}</h4>@endif
                @if($link->description)<p class="text-[11px] text-slate-400 line-clamp-2 mt-0.5 leading-snug">{{ $link->description }}</p>@endif
            </div>
        </div>
    </div>
    @endif
</div>
