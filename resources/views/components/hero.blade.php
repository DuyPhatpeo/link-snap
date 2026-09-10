{{-- Guest Hero Section + Hyper-Bar Shortener Form --}}
<div class="flex flex-col pt-3 sm:pt-6 pb-6 sm:pb-10 overflow-hidden">
    
    {{-- Hero Text Banner --}}
    <section class="relative z-10 max-w-4xl mx-auto text-center px-4 sm:px-6">
        
        {{-- Brand Chip --}}
        <div class="inline-flex items-center gap-2 px-3 py-1 bg-white/80 backdrop-blur-md rounded-full mb-3 border border-slate-200/80 shadow-sm">
            <span class="w-1.5 h-1.5 rounded-full bg-indigo-600"></span>
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
            <button onclick="Modal.open('registerModal')" class="px-6 py-3 bg-slate-900 hover:bg-black text-white rounded-full font-bold font-outfit text-xs uppercase tracking-wider shadow-lg hover:shadow-xl transition-all active:scale-95">
                Bắt đầu miễn phí &rarr;
            </button>
            <a href="#how-it-works" class="px-5 py-3 bg-white hover:bg-slate-50 text-slate-700 border border-slate-200 rounded-full font-bold font-outfit text-xs uppercase tracking-wider shadow-sm transition-all">
                Xem tính năng
            </a>
        </div>
    </section>

    {{-- Guest URL Shortener Hyper-Bar --}}
    <div class="w-full max-w-4xl mx-auto pt-6 sm:pt-8 px-4 sm:px-6 relative">
        <div class="relative rounded-2xl sm:rounded-full bg-white/95 backdrop-blur-2xl p-1.5 sm:p-2 border border-slate-200/90 shadow-[0_20px_50px_-15px_rgba(99,102,241,0.2)] focus-within:shadow-[0_20px_50px_-10px_rgba(99,102,241,0.3)] focus-within:border-indigo-500 transition-all duration-300">
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
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold font-outfit px-7 sm:px-8 py-3 rounded-xl sm:rounded-full transition-all shadow-sm hover:shadow uppercase tracking-wider text-xs active:scale-95 whitespace-nowrap">
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
</div>
