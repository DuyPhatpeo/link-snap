{{-- Guest Hero Section + Hyper-Bar Shortener Form --}}
<div class="flex flex-col pt-3 sm:pt-6 pb-6 sm:pb-10 overflow-hidden">
    
    {{-- Hero Text Banner --}}
    <section class="relative z-10 max-w-4xl mx-auto text-center px-4 sm:px-6">
        
        {{-- Brand Chip --}}
        <div class="inline-flex items-center gap-2 px-3 py-1 bg-white/80 backdrop-blur-md rounded-md mb-3 border border-slate-200/80 shadow-sm">
            <span class="w-1.5 h-1.5 rounded-sm bg-indigo-600"></span>
            <span class="text-[10px] font-black font-outfit text-slate-700 tracking-wider uppercase">LinkSnap 2.0 &bull; Nền Tảng Thế Hệ Mới</span>
        </div>

        {{-- Main Heading --}}
        <h1 class="text-3xl sm:text-5xl md:text-6xl font-black font-outfit text-slate-900 leading-[1.1] tracking-tight mb-3">
            Rút gọn liên kết. <br>
            <span class="text-gradient-aurora">Kiểm soát tất cả.</span>
        </h1>
        
        <p class="max-w-2xl mx-auto text-slate-500 font-medium text-xs sm:text-base leading-relaxed mb-5">
            Nền tảng rút gọn link tốc độ cao, tích hợp bảo vệ bằng mật khẩu, tự động tạo mã QR và xây dựng trang cá nhân Bio đa liên kết chỉ trong vài giây.
        </p>

        <div class="flex flex-wrap items-center justify-center gap-2.5">
            <button onclick="Modal.open('registerModal')" class="px-6 py-3 bg-slate-900 hover:bg-black text-white rounded-xl font-bold font-outfit text-xs uppercase tracking-wider shadow-lg hover:shadow-xl transition-all active:scale-95">
                Bắt đầu miễn phí &rarr;
            </button>
            <a href="#how-it-works" class="px-5 py-3 bg-white hover:bg-slate-50 text-slate-700 border border-slate-200 rounded-xl font-bold font-outfit text-xs uppercase tracking-wider shadow-sm transition-all">
                Xem tính năng
            </a>
        </div>
    </section>

    {{-- Guest URL Shortener Hyper-Bar --}}
    <div class="w-full max-w-4xl mx-auto pt-6 sm:pt-8 px-4 sm:px-6 relative">
        <div class="relative rounded-2xl bg-white/95 backdrop-blur-2xl p-1.5 sm:p-2 border border-slate-200/90 shadow-[0_20px_50px_-15px_rgba(99,102,241,0.2)] focus-within:shadow-[0_20px_50px_-10px_rgba(99,102,241,0.3)] focus-within:border-indigo-500 transition-all duration-300">
            <form onsubmit="LinkManager.handleShorten(event)" class="flex flex-col sm:flex-row items-stretch sm:items-center gap-1.5">
                @csrf
                <div class="flex-1 relative flex items-center">
                    <div class="pl-3 sm:pl-4 text-indigo-500 shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.826a4 4 0 015.656 0l4 4a4 4 0 01-5.656 5.656l-1.1-1.1" />
                        </svg>
                    </div>
                    <input type="url" id="url" placeholder="Dán link dài muốn rút gọn vào đây..." required
                        class="w-full bg-transparent py-3 sm:py-3.5 pl-2.5 pr-16 text-xs sm:text-sm font-semibold text-slate-800 placeholder:text-slate-400 outline-none">
                    
                    <div class="absolute right-2.5 flex items-center gap-1">
                        <button type="button" id="clearUrl" onclick="LinkManager.clearInput('url')" class="text-slate-400 hover:text-rose-500 hidden transition-all p-1 active:scale-90" title="Xóa">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" /></svg>
                        </button>
                    </div>
                </div>

                <button type="submit" id="btnSubmit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold font-outfit px-7 sm:px-8 py-3 rounded-xl transition-all shadow-sm hover:shadow uppercase tracking-wider text-xs active:scale-95 whitespace-nowrap">
                    Rút gọn ngay ✨
                </button>
            </form>
        </div>

        <div class="flex items-center justify-center gap-5 mt-3 text-xs font-semibold text-slate-400">
            <span class="flex items-center gap-1">
                <svg class="w-3.5 h-3.5 text-emerald-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                Không cần thẻ tín dụng
            </span>
            <span class="flex items-center gap-1">
                <svg class="w-3.5 h-3.5 text-emerald-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                Mã QR tức thì
            </span>
            <span class="hidden sm:flex items-center gap-1">
                <svg class="w-3.5 h-3.5 text-emerald-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                Chuyển hướng dưới 50ms
            </span>
        </div>
    </div>

    {{-- Interactive SaaS Dashboard App Showcase Mockup --}}
    <div class="w-full max-w-5xl mx-auto mt-8 sm:mt-12 px-4 sm:px-6 relative">
        {{-- Floating Badges around the app --}}
        <div class="hidden lg:flex items-center gap-2 px-3.5 py-2 bg-white/95 backdrop-blur-md rounded-xl border border-slate-200/80 shadow-xl shadow-slate-900/5 absolute -top-5 -left-2 z-20 animate-bounce [animation-duration:4s]">
            <div class="w-7 h-7 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold text-xs">⚡</div>
            <div>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Tốc độ chuyển hướng</p>
                <p class="text-xs font-black text-slate-800 tracking-tight">38ms &bull; Siêu tốc</p>
            </div>
        </div>

        <div class="hidden lg:flex items-center gap-2 px-3.5 py-2 bg-white/95 backdrop-blur-md rounded-xl border border-slate-200/80 shadow-xl shadow-slate-900/5 absolute -top-4 -right-2 z-20 animate-bounce [animation-duration:5s]">
            <div class="w-7 h-7 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center font-bold text-xs">📈</div>
            <div>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Lượt click tháng này</p>
                <p class="text-xs font-black text-emerald-600 tracking-tight">+184.5% Tăng trưởng</p>
            </div>
        </div>

        {{-- Browser/App Frame --}}
        <div class="relative rounded-2xl bg-white border border-slate-200/90 shadow-[0_25px_70px_-15px_rgba(99,102,241,0.25)] overflow-hidden transition-all duration-500 hover:shadow-[0_30px_90px_-15px_rgba(99,102,241,0.35)]">
            {{-- Window Header Bar --}}
            <div class="bg-slate-50/90 border-b border-slate-200/80 px-4 py-3 flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-rose-400/80 inline-block"></span>
                    <span class="w-3 h-3 rounded-full bg-amber-400/80 inline-block"></span>
                    <span class="w-3 h-3 rounded-full bg-emerald-400/80 inline-block"></span>
                </div>
                <div class="hidden sm:flex items-center gap-1.5 px-4 py-1 bg-white rounded-lg border border-slate-200/80 text-[11px] font-mono text-slate-400">
                    <svg class="w-3 h-3 text-emerald-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 1.944A11.954 11.954 0 012.166 5C2.056 5.649 2 6.319 2 7c0 5.225 3.34 9.67 8 11.317C14.66 16.67 18 12.225 18 7c0-.682-.057-1.35-.166-2.001A11.954 11.954 0 0110 1.944z" clip-rule="evenodd" /></svg>
                    <span>https://linksnap.app/dashboard</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="px-2 py-0.5 rounded-md bg-emerald-50 text-emerald-600 text-[10px] font-bold font-mono">Live 99.9%</span>
                </div>
            </div>

            {{-- Mockup Interior --}}
            <div class="p-4 sm:p-6 bg-gradient-to-b from-white to-slate-50/50 space-y-5">
                {{-- Mock Stats Row --}}
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                    <div class="p-3 bg-slate-50/80 rounded-xl border border-slate-200/60">
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Tổng liên kết</p>
                        <p class="text-lg sm:text-xl font-black font-outfit text-slate-900 mt-0.5">1,248</p>
                        <span class="text-[10px] font-bold text-emerald-600">+12 hôm nay</span>
                    </div>
                    <div class="p-3 bg-slate-50/80 rounded-xl border border-slate-200/60">
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Lượt click thực</p>
                        <p class="text-lg sm:text-xl font-black font-outfit text-indigo-600 mt-0.5">84,920</p>
                        <span class="text-[10px] font-bold text-indigo-600">+2.4k tuần này</span>
                    </div>
                    <div class="p-3 bg-slate-50/80 rounded-xl border border-slate-200/60">
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">QR Đã quét</p>
                        <p class="text-lg sm:text-xl font-black font-outfit text-violet-600 mt-0.5">19,430</p>
                        <span class="text-[10px] font-bold text-violet-600">Độ nét cao</span>
                    </div>
                    <div class="p-3 bg-slate-50/80 rounded-xl border border-slate-200/60">
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Trang Bio Live</p>
                        <p class="text-lg sm:text-xl font-black font-outfit text-emerald-600 mt-0.5">5,620</p>
                        <span class="text-[10px] font-bold text-emerald-600">Chuẩn di động</span>
                    </div>
                </div>

                {{-- Mock Visual Graph & Link Rows --}}
                <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-center">
                    {{-- Left: Smooth SVG Wave Graph --}}
                    <div class="md:col-span-7 bg-white p-4 rounded-xl border border-slate-200/80 shadow-sm">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-xs font-bold text-slate-700 font-outfit">Lưu lượng truy cập 14 ngày qua</span>
                            <span class="text-[10px] font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-md">Trực tiếp &bull; Realtime</span>
                        </div>
                        <div class="h-28 w-full relative">
                            <svg class="w-full h-full" viewBox="0 0 500 100" preserveAspectRatio="none">
                                <defs>
                                    <linearGradient id="heroGradient" x1="0" y1="0" x2="0" y2="1">
                                        <stop offset="0%" stop-color="#6366f1" stop-opacity="0.35"/>
                                        <stop offset="100%" stop-color="#6366f1" stop-opacity="0.0"/>
                                    </linearGradient>
                                </defs>
                                <path d="M0,80 Q50,65 100,70 T200,45 T300,50 T400,20 T500,10 L500,100 L0,100 Z" fill="url(#heroGradient)"/>
                                <path d="M0,80 Q50,65 100,70 T200,45 T300,50 T400,20 T500,10" fill="none" stroke="#6366f1" stroke-width="3" stroke-linecap="round"/>
                                <circle cx="400" cy="20" r="4" fill="#6366f1" class="animate-ping" />
                                <circle cx="400" cy="20" r="4" fill="#6366f1" />
                                <circle cx="500" cy="10" r="4" fill="#4f46e5" />
                            </svg>
                        </div>
                    </div>

                    {{-- Right: Sample Interactive Link Previews --}}
                    <div class="md:col-span-5 space-y-2">
                        <div class="p-3 bg-white rounded-xl border border-slate-200/80 shadow-sm flex items-center justify-between gap-2">
                            <div class="min-w-0">
                                <p class="text-[11px] font-bold font-mono text-indigo-600 truncate">linksnap.app/tiktok-promo</p>
                                <p class="text-[10px] text-slate-400 truncate">https://tiktok.com/@creator/video/19847...</p>
                            </div>
                            <span class="text-[10px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-md shrink-0">1.8k click</span>
                        </div>
                        <div class="p-3 bg-white rounded-xl border border-slate-200/80 shadow-sm flex items-center justify-between gap-2">
                            <div class="min-w-0">
                                <p class="text-[11px] font-bold font-mono text-indigo-600 truncate">linksnap.app/portfolio</p>
                                <p class="text-[10px] text-slate-400 truncate">https://behance.net/gallery/982341...</p>
                            </div>
                            <span class="text-[10px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-md shrink-0">4.2k click</span>
                        </div>
                        <div class="p-3 bg-white rounded-xl border border-slate-200/80 shadow-sm flex items-center justify-between gap-2">
                            <div class="min-w-0">
                                <p class="text-[11px] font-bold font-mono text-indigo-600 truncate">linksnap.app/youtube-live</p>
                                <p class="text-[10px] text-slate-400 truncate">https://youtube.com/watch?v=live98...</p>
                            </div>
                            <span class="text-[10px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-md shrink-0">890 click</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
