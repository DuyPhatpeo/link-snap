{{-- Advanced Configurations (Password, Expiration, Click Limit, OG Preview) --}}
@if($link->password || $link->expires_at || $link->click_limit || $link->title || $link->description)
<div class="glass-card rounded-2xl p-5 sm:p-6 border border-slate-200/80 shadow-sm animate-in fade-in duration-500 delay-300">
    <div class="flex items-center gap-2 mb-4">
        <span class="w-1.5 h-4 bg-violet-600 rounded-full"></span>
        <h3 class="text-sm font-black font-outfit text-slate-900 tracking-tight">Cấu hình nâng cao</h3>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        {{-- Mật khẩu bảo vệ --}}
        @if($link->password)
        @php
            try {
                $decryptedPwd = \Illuminate\Support\Facades\Crypt::decryptString($link->password);
            } catch (\Exception $e) {
                $decryptedPwd = '[Đã mã hóa 1 chiều]';
            }
        @endphp
        <div class="bg-slate-50/80 p-4 rounded-xl border border-slate-200/60 transition-all hover:border-indigo-200">
            <p class="text-[10px] font-black font-outfit uppercase tracking-wider text-slate-400 flex items-center gap-1.5 mb-2.5">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                Mật khẩu
            </p>
            <div class="flex items-center gap-1.5">
                <form id="pwdUpdateForm" onsubmit="LinkApi.updatePwd(event, '{{ $link->short_code }}')" class="relative flex-1" style="display:none;">
                    @csrf
                    <input type="text" name="password" required class="w-full bg-white border border-indigo-500 rounded-lg text-xs font-bold text-slate-700 px-3 py-1.5 pr-12 focus:ring-2 focus:ring-indigo-100 outline-none transition-all">
                    <button type="submit" class="absolute right-1 top-1 bottom-1 px-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-[9px] font-black uppercase tracking-wider rounded transition-all">Lưu</button>
                </form>
                <div id="pwdDisplayArea" class="relative flex-1 group">
                    <input type="password" id="displayPassword" value="{{ $decryptedPwd }}" readonly class="w-full bg-white border border-slate-200/80 rounded-lg text-xs font-bold font-mono text-indigo-600 px-3 py-1.5 pr-8 outline-none cursor-pointer" onclick="this.select()">
                    <button type="button" onclick="const p=document.getElementById('displayPassword'); p.type=p.type==='password'?'text':'password'; this.classList.toggle('text-indigo-600')" class="absolute right-2 top-1/2 -translate-y-1/2 text-slate-300 hover:text-indigo-600 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                    </button>
                </div>
                <button type="button" id="pwdEditBtn" onclick="document.getElementById('pwdDisplayArea').style.display='none'; document.getElementById('pwdUpdateForm').style.display='block'; this.style.display='none';" class="p-1.5 shrink-0 bg-white text-slate-400 hover:text-indigo-600 border border-slate-200/80 rounded-lg transition-all" title="Chỉnh sửa">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg>
                </button>
            </div>
        </div>
        @else
        <div class="bg-slate-50/80 p-4 rounded-xl border border-slate-200/60 transition-all hover:border-indigo-200 flex flex-col justify-center">
            <p class="text-[10px] font-black font-outfit uppercase tracking-wider text-slate-400 flex items-center gap-1.5 mb-1.5">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                Mật khẩu
            </p>
            <form id="pwdUpdateForm" onsubmit="LinkApi.updatePwd(event, '{{ $link->short_code }}')" class="relative flex-1 group">
                @csrf
                <input type="text" name="password" placeholder="Chưa thiết lập..." class="w-full bg-white border border-slate-200 rounded-lg text-xs font-bold text-slate-700 px-3 py-1.5 pr-12 focus:ring-2 focus:ring-indigo-50 focus:border-indigo-500 outline-none transition-all">
                <button type="submit" class="absolute right-1 top-1 bottom-1 px-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-[9px] font-black uppercase tracking-wider rounded transition-all opacity-0 group-focus-within:opacity-100 hover:opacity-100">Lưu</button>
            </form>
        </div>
        @endif

        {{-- Hạn sử dụng --}}
        @if($link->expires_at)
        <div class="bg-slate-50/80 p-4 rounded-xl border border-slate-200/60 relative overflow-hidden flex flex-col justify-center">
            @if($link->expires_at->isPast())
                <div class="absolute inset-0 bg-rose-50/30"></div>
            @endif
            <div class="relative">
                <p class="text-[10px] font-black font-outfit uppercase tracking-wider text-slate-400 mb-1.5 flex items-center gap-1.5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                    Thời hạn
                </p>
                <p class="text-xs font-bold font-mono {{ $link->expires_at->isPast() ? 'text-rose-500' : 'text-slate-800' }} tracking-tight">{{ $link->expires_at->format('H:i d/m/Y') }}</p>
                @if($link->expires_at->isPast())
                    <p class="text-[9px] font-black uppercase tracking-wider text-rose-500 mt-0.5">Đã hết hạn</p>
                @endif
            </div>
        </div>
        @endif

        {{-- Giới hạn click --}}
        @if($link->click_limit)
        <div class="bg-slate-50/80 p-4 rounded-xl border border-slate-200/60 flex flex-col justify-center">
            <p class="text-[10px] font-black font-outfit uppercase tracking-wider text-slate-400 mb-1.5 flex items-center gap-1.5">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15.042 21.672 13.684 16.6m0 0-2.51 2.225.569-9.47 5.227 7.917-3.286-.672ZM12 2.25V4.5m5.834.166-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243-1.59-1.59" /></svg>
                Giới hạn Click
            </p>
            <p class="text-xs font-bold font-outfit text-slate-800 tracking-tight">{{ number_format($link->click_limit) }} lượt</p>
            @if($link->clicks >= $link->click_limit)
                <p class="text-[9px] font-black uppercase tracking-wider text-rose-500 mt-0.5">Đã đạt mức tối đa</p>
            @endif
        </div>
        @endif

        {{-- Thẻ mạng xã hội (OpenGraph) --}}
        @if($link->title || $link->description)
        <div class="bg-slate-50/80 p-4 sm:p-5 rounded-xl border border-slate-200/60 lg:col-span-3">
            <p class="text-[10px] font-black font-outfit uppercase tracking-wider text-slate-400 mb-3 flex items-center gap-1.5">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" /></svg>
                Xem trước mạng xã hội (OpenGraph)
            </p>
            <div class="flex flex-col sm:flex-row gap-4 items-start">
                @if($link->thumbnail)
                    <div class="shrink-0 p-1 bg-white rounded-xl border border-slate-200/80 shadow-sm">
                        <img src="{{ $link->thumbnail }}" alt="Thumb" class="w-16 h-16 sm:w-20 sm:h-20 object-cover rounded-lg">
                    </div>
                @endif
                <div class="space-y-1 min-w-0">
                    @if($link->title)<h4 class="font-outfit text-sm sm:text-base font-black text-slate-900 leading-snug">{{ $link->title }}</h4>@endif
                    @if($link->description)<p class="text-xs font-medium text-slate-500 leading-relaxed max-w-xl">{{ $link->description }}</p>@endif
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endif
