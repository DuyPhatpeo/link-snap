{{-- === BẢNG ĐIỀU KHIỂN DÀNH CHO USER ĐÃ ĐĂNG NHẬP === --}}
<div class="flex flex-col px-3 sm:px-6 max-w-6xl mx-auto pt-4 sm:pt-6 pb-12">
    
    {{-- Section: Welcome & Status Chip --}}
    <section class="mt-1 mb-4">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-3">
            <div class="space-y-1">
                <div class="inline-flex items-center gap-1.5 px-2.5 py-0.5 bg-indigo-50 border border-indigo-100 rounded-md">
                    <span class="w-1.5 h-1.5 rounded-sm bg-emerald-500 animate-ping"></span>
                    <span class="w-1.5 h-1.5 rounded-sm bg-emerald-500 -ml-2"></span>
                    <span class="text-[10px] font-bold text-indigo-700 tracking-wide">Workspace Trực Tuyến</span>
                </div>
                <h1 class="text-2xl sm:text-3xl font-black font-outfit text-slate-900 tracking-tight">
                    Xin chào, <span class="text-gradient-aurora">{{ auth()->user()->name }}</span>!
                </h1>
                <p class="text-slate-500 font-medium text-xs">Tạo liên kết rút gọn mới hoặc theo dõi số liệu thời gian thực bên dưới.</p>
            </div>
            
            {{-- Date Pill --}}
            <div class="hidden sm:flex items-center gap-2.5 bg-white/80 backdrop-blur-md px-3.5 py-2 rounded-xl border border-slate-200/70 shadow-sm">
                <div class="w-7 h-7 rounded-lg bg-indigo-50 flex items-center justify-center text-indigo-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <div>
                    <p class="text-[9px] font-bold text-slate-400 uppercase tracking-widest leading-none">Hôm nay</p>
                    <p class="text-xs font-black text-slate-800 tracking-tight mt-0.5">{{ now()->translatedFormat('d M, Y') }}</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Section: Hyper-Bar Shortener (Trọng tâm trải nghiệm) --}}
    <section class="w-full mb-6 relative">
        <div class="relative rounded-2xl bg-white/90 backdrop-blur-2xl p-1.5 sm:p-2 border border-slate-200/90 shadow-[0_15px_35px_-10px_rgba(99,102,241,0.15)] focus-within:shadow-[0_15px_35px_-5px_rgba(99,102,241,0.25)] focus-within:border-indigo-500 transition-all duration-300">
            <form onsubmit="LinkManager.handleShorten(event)" class="flex flex-col sm:flex-row items-stretch sm:items-center gap-1.5">
                @csrf
                {{-- Input URL chính --}}
                <div class="flex-1 relative flex items-center">
                    <div class="pl-3 sm:pl-4 text-indigo-500 shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.826a4 4 0 015.656 0l4 4a4 4 0 01-5.656 5.656l-1.1-1.1" />
                        </svg>
                    </div>
                    <input type="url" id="url" placeholder="Dán liên kết dài vào đây (https://...)" required
                        class="w-full bg-transparent py-3 sm:py-3.5 pl-2.5 pr-16 text-xs sm:text-sm font-semibold text-slate-800 placeholder:text-slate-400 outline-none transition-all">
                    
                    {{-- Quick Paste / Clear Button --}}
                    <div class="absolute right-2.5 flex items-center gap-1">
                        <button type="button" id="clearUrl" onclick="LinkManager.clearInput('url')" class="text-slate-400 hover:text-rose-500 hidden transition-all p-1 active:scale-90" title="Xóa">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" /></svg>
                        </button>
                        <button type="button" onclick="navigator.clipboard.readText().then(text => { document.getElementById('url').value = text; document.getElementById('clearUrl').classList.remove('hidden'); }).catch(() => {})" class="hidden sm:inline-flex items-center gap-1 px-2 py-0.5 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-md text-[9px] font-bold tracking-wide transition-all" title="Dán nhanh từ bộ nhớ tạm">
                            <span>Dán</span>
                        </button>
                    </div>
                </div>

                {{-- Mã Tùy Chỉnh (Alias) --}}
                <div class="sm:w-44 border-t sm:border-t-0 sm:border-l border-slate-200/80 px-2 flex items-center">
                    <span class="text-xs font-bold text-slate-400 font-mono select-none">/</span>
                    <input type="text" id="customCode" placeholder="mã-tuỳ-chỉnh"
                        class="w-full bg-transparent py-2.5 sm:py-3.5 pl-1 pr-2 text-xs font-bold font-mono text-slate-800 placeholder:text-slate-400 outline-none">
                </div>

                {{-- Nút Submit --}}
                <button type="submit" id="btnSubmit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold font-outfit px-6 sm:px-7 py-3 rounded-xl transition-all shadow-sm hover:shadow uppercase tracking-wider text-xs active:scale-95 whitespace-nowrap">
                    Rút gọn link ✨
                </button>
            </form>
        </div>

        {{-- Nút Mở Tùy Chọn Nâng Cao --}}
        <div class="flex justify-center mt-2.5">
            <button type="button" onclick="LinkManager.toggleAdvanced()" class="inline-flex items-center gap-1.5 px-3 py-1 rounded-md bg-white/70 hover:bg-white border border-slate-200/60 shadow-sm text-slate-500 hover:text-indigo-600 transition-all text-[11px] font-bold">
                <span class="uppercase tracking-wider">Cấu hình bảo vệ & nâng cao</span>
                <svg id="advancedIcon" xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
        </div>

        {{-- Panel Tùy Chọn Nâng Cao (Accordion Card) --}}
        <div id="advancedPanel" class="hidden mt-4 grid grid-cols-1 md:grid-cols-3 gap-3">
            {{-- Box 1: Mật khẩu bảo vệ --}}
            <div class="glass-card rounded-2xl p-4 border border-slate-200/70 space-y-2">
                <div class="flex items-center gap-2 text-indigo-600">
                    <div class="p-1.5 bg-indigo-50 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                    </div>
                    <span class="text-[11px] font-black uppercase tracking-wider text-slate-700">Mật khẩu bảo vệ</span>
                </div>
                <p class="text-[10px] text-slate-400">Yêu cầu người xem nhập mật khẩu để mở link gốc.</p>
                <input type="password" id="linkPassword" placeholder="Nhập mật khẩu..." 
                    class="w-full bg-white border border-slate-200 rounded-xl py-2 px-3 text-xs font-semibold text-slate-800 outline-none focus:border-indigo-500 transition-all">
            </div>

            {{-- Box 2: Giới hạn truy cập --}}
            <div class="glass-card rounded-2xl p-4 border border-slate-200/70 space-y-2">
                <div class="flex items-center gap-2 text-amber-600">
                    <div class="p-1.5 bg-amber-50 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                    <span class="text-[11px] font-black uppercase tracking-wider text-slate-700">Thời hạn & Lượt click</span>
                </div>
                <p class="text-[10px] text-slate-400">Tự động vô hiệu hóa sau thời gian hoặc số click.</p>
                <div class="space-y-1.5">
                    <input type="datetime-local" id="expiresAt" title="Thời gian hết hạn"
                        class="w-full bg-white border border-slate-200 rounded-xl py-1.5 px-2.5 text-[11px] font-semibold text-slate-700 outline-none focus:border-indigo-500">
                    <input type="number" id="clickLimit" placeholder="Giới hạn số lượt click..." min="1"
                        class="w-full bg-white border border-slate-200 rounded-xl py-1.5 px-3 text-xs font-semibold text-slate-800 outline-none focus:border-indigo-500">
                </div>
            </div>

            {{-- Box 3: Xem trước mạng xã hội --}}
            <div class="glass-card rounded-2xl p-4 border border-slate-200/70 space-y-2">
                <div class="flex items-center gap-2 text-emerald-600">
                    <div class="p-1.5 bg-emerald-50 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                    </div>
                    <span class="text-[11px] font-black uppercase tracking-wider text-slate-700">Tùy biến Thẻ Card (OG)</span>
                </div>
                <p class="text-[10px] text-slate-400">Hiển thị đẹp mắt khi chia sẻ qua Zalo, Messenger, Facebook.</p>
                <div class="space-y-1.5">
                    <input type="text" id="metaTitle" placeholder="Tiêu đề hiển thị..." 
                        class="w-full bg-white border border-slate-200 rounded-xl py-1.5 px-3 text-xs font-semibold text-slate-800 outline-none focus:border-indigo-500">
                    <input type="text" id="metaDescription" placeholder="Mô tả ngắn gọn..." 
                        class="w-full bg-white border border-slate-200 rounded-xl py-1.5 px-3 text-xs font-semibold text-slate-800 outline-none focus:border-indigo-500">
                    <input type="url" id="metaThumbnail" placeholder="Link ảnh Thumbnail (https://...)" 
                        class="w-full bg-white border border-slate-200 rounded-xl py-1.5 px-3 text-xs font-semibold text-slate-800 outline-none focus:border-indigo-500">
                </div>
            </div>
        </div>
    </section>

    {{-- Section: Stats & Analytics Widget (Hiển thị ngay dưới Shortener) --}}
    <section class="mb-6">
        @include('components.stats-widget')
    </section>

    {{-- Section: Two-Column Bento Panels (Links & Click Logs) --}}
    <section class="grid grid-cols-1 lg:grid-cols-2 gap-5 items-start mb-8">
        @include('components.links-panel')
        @include('components.logs-panel')
    </section>

    {{-- Section: Spotlight Banner Bio (Chân trang làm việc) --}}
    <section class="relative overflow-hidden rounded-2xl bg-slate-900 p-5 sm:p-6 text-white shadow-lg border border-slate-800">
        <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-4">
            <div class="max-w-xl space-y-1.5 text-center md:text-left">
                <div class="inline-flex items-center gap-2 px-2.5 py-0.5 bg-slate-800 rounded-md border border-slate-700">
                    <span class="w-1.5 h-1.5 rounded-sm bg-indigo-400"></span>
                    <span class="text-[9px] font-black uppercase tracking-widest text-indigo-300">Bio Profile Builder</span>
                </div>
                <h2 class="text-lg sm:text-xl font-black font-outfit leading-snug">
                    Tạo trang cá nhân Bio chuyên nghiệp chỉ trong 60 giây
                </h2>
                <p class="text-slate-300 text-xs font-medium leading-relaxed">
                    Tập hợp tất cả liên kết mạng xã hội vào một trang duy nhất chuẩn TikTok/Instagram với giao diện tuỳ biến.
                </p>
            </div>
            <a href="{{ route('bio.index') }}" class="px-5 py-2.5 bg-indigo-600 hover:bg-indigo-500 text-white font-black font-outfit rounded-xl shadow-sm transition-all hover:scale-105 active:scale-95 text-xs uppercase tracking-wider shrink-0">
                Quản lý trang Bio &rarr;
            </a>
        </div>
    </section>

</div>
