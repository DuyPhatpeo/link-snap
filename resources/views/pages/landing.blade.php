{{-- === TRANG CHỦ DÀNH CHO KHÁCH (LANDING PAGE) === --}}

{{-- Hero Section --}}
<div class="pt-1 pb-6">
    @include('components.hero')
</div>

{{-- Live Counter Stats --}}
<div class="relative w-full py-4">
    @include('components.stats')
</div>

{{-- Bento Features --}}
<div class="relative w-full py-6">
    @include('components.features')
</div>

{{-- Giới thiệu Trang Bio cho Khách --}}
<section class="py-12 relative overflow-hidden" id="bio-showcase">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 grid grid-cols-1 lg:grid-cols-2 gap-10 items-center relative z-10">
        {{-- Mockup Điện thoại & Bộ Chuyển Đổi Theme Trực Tiếp --}}
        <div class="flex flex-col items-center justify-center">
            <div class="relative group">
                <div class="absolute inset-0 bg-indigo-500/20 blur-3xl rounded-full"></div>

                {{-- Floating Stat Chips --}}
                <div class="absolute -top-3 -right-6 z-20 bg-white/90 backdrop-blur-md px-3.5 py-2 rounded-2xl border border-slate-200/80 shadow-xl flex items-center gap-2 hover:-translate-y-1 transition-transform duration-300 cursor-default">
                    <span class="text-sm">❤️</span>
                    <div>
                        <p class="text-[9px] text-slate-400 font-bold uppercase tracking-wider">Tương tác</p>
                        <p class="text-xs font-black font-outfit text-slate-900">14.8k Likes</p>
                    </div>
                </div>

                <div class="absolute top-1/2 -left-8 -translate-y-1/2 z-20 bg-white/90 backdrop-blur-md px-3.5 py-2 rounded-2xl border border-slate-200/80 shadow-xl flex items-center gap-2 hidden sm:flex hover:-translate-y-1 transition-transform duration-300 cursor-default">
                    <span class="text-sm">🔗</span>
                    <div>
                        <p class="text-[9px] text-slate-400 font-bold uppercase tracking-wider">Đã kết nối</p>
                        <p class="text-xs font-black font-outfit text-slate-900">12 Links</p>
                    </div>
                </div>

                <div class="absolute -bottom-3 -right-4 z-20 bg-white/90 backdrop-blur-md px-3.5 py-2 rounded-2xl border border-slate-200/80 shadow-xl flex items-center gap-2 hover:-translate-y-1 transition-transform duration-300 cursor-default">
                    <span class="text-sm">✨</span>
                    <div>
                        <p class="text-[9px] text-slate-400 font-bold uppercase tracking-wider">Hiệu suất</p>
                        <p class="text-xs font-black font-outfit text-emerald-600">99.8% CTR</p>
                    </div>
                </div>

                {{-- Phone Shell --}}
                <div class="relative w-[270px] sm:w-[310px] bg-slate-950 rounded-[44px] p-2.5 shadow-2xl border-4 border-slate-800 transform -rotate-1 hover:rotate-0 transition-transform duration-500">
                    <div id="landingPhoneScreen" class="bg-slate-900 h-[500px] rounded-[34px] p-5 flex flex-col items-center text-center overflow-hidden border border-white/10 relative transition-all duration-500">
                        
                        {{-- Mobile Status Bar --}}
                        <div class="w-full flex items-center justify-between text-slate-400 text-[10px] px-2 mb-3 shrink-0">
                            <span class="font-bold text-white">9:41</span>
                            <div class="w-16 h-3.5 bg-black rounded-full mx-auto"></div>
                            <div class="flex items-center gap-1 text-[9px]">
                                <span>5G</span>
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 3c-4.97 0-9 4.03-9 9 0 2.12.74 4.07 1.97 5.61L4.35 19.3c-.39.39-.39 1.02 0 1.41.39.39 1.02.39 1.41 0l1.9-1.9C9.22 19.57 10.56 20 12 20c4.97 0 9-4.03 9-9s-4.03-9-9-9z"/></svg>
                            </div>
                        </div>

                        {{-- Profile Info --}}
                        <div class="relative mb-2">
                            <div id="landingAvatarRing" class="w-16 h-16 rounded-2xl bg-gradient-to-tr from-indigo-500 to-violet-500 p-0.5 shadow-lg transition-all duration-300">
                                <img src="{{ asset('logo.png') }}" class="w-full h-full object-cover rounded-2xl bg-white p-1.5">
                            </div>
                            <span class="absolute -bottom-1 -right-1 bg-blue-500 text-white text-[10px] w-4 h-4 rounded-full flex items-center justify-center border border-slate-900 font-bold" title="Verified">✓</span>
                        </div>

                        <h4 class="text-white font-black font-outfit text-sm">@creator_pro</h4>
                        <p class="text-indigo-200/70 text-[11px] mb-4 font-medium">Nhiếp ảnh gia & Sáng tạo nội dung</p>
                        
                        {{-- Link Buttons --}}
                        <div class="w-full space-y-2.5 overflow-y-auto pr-0.5">
                            <div class="w-full py-2.5 px-3.5 bg-white/10 hover:bg-white/20 backdrop-blur-md rounded-xl text-white text-xs font-bold border border-white/10 flex items-center justify-between transition-all group/btn cursor-pointer">
                                <div class="flex items-center gap-2">
                                    <span class="w-6 h-6 rounded-lg bg-red-500/20 text-red-400 flex items-center justify-center text-xs">▶</span>
                                    <span class="truncate">Kênh YouTube chính thức</span>
                                </div>
                                <span class="text-slate-400 group-hover/btn:text-white transition-colors">&rarr;</span>
                            </div>

                            <div class="w-full py-2.5 px-3.5 bg-white/10 hover:bg-white/20 backdrop-blur-md rounded-xl text-white text-xs font-bold border border-white/10 flex items-center justify-between transition-all group/btn cursor-pointer">
                                <div class="flex items-center gap-2">
                                    <span class="w-6 h-6 rounded-lg bg-pink-500/20 text-pink-400 flex items-center justify-center text-xs">📸</span>
                                    <span class="truncate">Instagram Portfolio</span>
                                </div>
                                <span class="text-slate-400 group-hover/btn:text-white transition-colors">&rarr;</span>
                            </div>

                            <div class="w-full py-2.5 px-3.5 bg-white/10 hover:bg-white/20 backdrop-blur-md rounded-xl text-white text-xs font-bold border border-white/10 flex items-center justify-between transition-all group/btn cursor-pointer">
                                <div class="flex items-center gap-2">
                                    <span class="w-6 h-6 rounded-lg bg-indigo-500/20 text-indigo-400 flex items-center justify-center text-xs">💼</span>
                                    <span class="truncate">Hợp tác kinh doanh & Booking</span>
                                </div>
                                <span class="text-slate-400 group-hover/btn:text-white transition-colors">&rarr;</span>
                            </div>

                            <div id="landingHighlightBtn" class="w-full py-2.5 px-3.5 bg-gradient-to-r from-indigo-500/30 to-violet-500/30 hover:from-indigo-500/40 hover:to-violet-500/40 backdrop-blur-md rounded-xl text-white text-xs font-bold border border-indigo-400/30 flex items-center justify-between transition-all group/btn cursor-pointer">
                                <div class="flex items-center gap-2">
                                    <span class="w-6 h-6 rounded-lg bg-emerald-500/20 text-emerald-400 flex items-center justify-center text-xs">⚡</span>
                                    <span class="truncate">Khóa học Nhiếp ảnh 2026</span>
                                </div>
                                <span class="text-emerald-400 font-black text-[10px] uppercase bg-emerald-500/20 px-1.5 py-0.5 rounded">Mới</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            {{-- Interactive Theme Switcher Controller --}}
            <div class="mt-5 flex items-center gap-2 bg-white/80 backdrop-blur-md p-1.5 rounded-2xl border border-slate-200/80 shadow-md">
                <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 px-2 font-mono">Thử Theme:</span>
                <button type="button" onclick="setLandingDemoTheme('midnight')" class="w-6 h-6 rounded-full bg-slate-900 border-2 border-white shadow-sm hover:scale-110 transition-transform active:scale-90" title="Midnight"></button>
                <button type="button" onclick="setLandingDemoTheme('aurora')" class="w-6 h-6 rounded-full bg-indigo-600 border-2 border-white shadow-sm hover:scale-110 transition-transform active:scale-90" title="Aurora Indigo"></button>
                <button type="button" onclick="setLandingDemoTheme('emerald')" class="w-6 h-6 rounded-full bg-emerald-600 border-2 border-white shadow-sm hover:scale-110 transition-transform active:scale-90" title="Emerald Glow"></button>
                <button type="button" onclick="setLandingDemoTheme('sunset')" class="w-6 h-6 rounded-full bg-rose-500 border-2 border-white shadow-sm hover:scale-110 transition-transform active:scale-90" title="Sunset Rose"></button>
            </div>
        </div>

        {{-- Nội dung giới thiệu --}}
        <div class="space-y-4 text-center lg:text-left">
            <div class="inline-flex items-center gap-2 px-3 py-1 bg-indigo-50 rounded-md border border-indigo-100">
                <span class="text-xs font-black font-outfit text-indigo-600 uppercase tracking-wider">Bio Page Builder</span>
            </div>
            <h2 class="text-2xl sm:text-4xl font-black font-outfit text-slate-900 leading-[1.15] tracking-tight">
                Một đường dẫn duy nhất cho <br class="hidden sm:block"> 
                <span class="text-gradient-aurora">toàn bộ sự hiện diện</span> của bạn.
            </h2>
            <p class="text-slate-600 font-medium text-xs sm:text-sm leading-relaxed max-w-xl mx-auto lg:mx-0">
                Thay thế danh sách link cồng kềnh trên tiểu sử mạng xã hội. LinkSnap Bio giúp người theo dõi dễ dàng tìm thấy các dự án, video, thông tin liên hệ và khóa học của bạn chỉ sau 1 chạm.
            </p>

            <div class="space-y-2.5 pt-2 max-w-md mx-auto lg:mx-0">
                <div class="flex items-center gap-3 text-xs font-semibold text-slate-700">
                    <span class="w-5 h-5 rounded-md bg-emerald-100 text-emerald-700 flex items-center justify-center text-[10px] font-black shrink-0">✓</span>
                    <span>Tùy biến không giới hạn liên kết, social icons và liên hệ</span>
                </div>
                <div class="flex items-center gap-3 text-xs font-semibold text-slate-700">
                    <span class="w-5 h-5 rounded-md bg-emerald-100 text-emerald-700 flex items-center justify-center text-[10px] font-black shrink-0">✓</span>
                    <span>Giao diện chuẩn di động tải siêu tốc dưới 0.1 giây</span>
                </div>
                <div class="flex items-center gap-3 text-xs font-semibold text-slate-700">
                    <span class="w-5 h-5 rounded-md bg-emerald-100 text-emerald-700 flex items-center justify-center text-[10px] font-black shrink-0">✓</span>
                    <span>Huy hiệu Verified và thống kê lượt click của từng nút link</span>
                </div>
            </div>

            <div class="pt-3">
                <button onclick="Modal.open('registerModal')" class="px-7 py-3.5 bg-slate-900 hover:bg-black text-white font-bold font-outfit text-xs uppercase tracking-widest rounded-xl shadow-lg hover:shadow-xl transition-all active:scale-95">
                    Tạo Bio Page Miễn Phí Ngay &rarr;
                </button>
            </div>
        </div>
    </div>
</section>

{{-- Bảng So Sánh Giá Trị --}}
@include('components.comparison')

{{-- Đánh Giá Khách Hàng (Testimonials) --}}
@include('components.testimonials')

{{-- FAQ Section --}}
@include('components.faq')

{{-- Bottom Call to Action --}}
<section class="py-12 max-w-6xl mx-auto px-4 sm:px-6">
    <div class="rounded-3xl bg-slate-950 p-8 sm:p-14 text-center text-white shadow-2xl relative overflow-hidden border border-slate-800">
        {{-- Ambient Glow --}}
        <div class="absolute -top-24 left-1/2 -translate-x-1/2 w-96 h-96 bg-indigo-600/30 rounded-full blur-[100px] pointer-events-none"></div>
        <div class="absolute -bottom-24 right-10 w-72 h-72 bg-violet-600/20 rounded-full blur-[90px] pointer-events-none"></div>

        <div class="relative z-10 max-w-2xl mx-auto space-y-4">
            <div class="inline-flex items-center gap-2 px-3 py-1 bg-white/10 backdrop-blur-md rounded-md border border-white/10 text-[10px] font-bold uppercase tracking-widest text-indigo-300">
                Sẵn sàng nâng tầm liên kết của bạn?
            </div>
            <h2 class="text-2xl sm:text-4xl md:text-5xl font-black font-outfit tracking-tight leading-tight">
                Bắt đầu trải nghiệm LinkSnap <br>
                <span class="text-gradient-aurora">hoàn toàn miễn phí.</span>
            </h2>
            <p class="text-slate-400 text-xs sm:text-sm font-medium leading-relaxed">
                Tạo link rút gọn bảo mật đầu tiên, nhận mã QR sắc nét và sở hữu trang Bio Profile ấn tượng chỉ trong 60 giây.
            </p>
            <div class="flex flex-wrap justify-center gap-3 pt-4">
                <button onclick="Modal.open('registerModal')" class="px-8 py-3.5 bg-indigo-600 hover:bg-indigo-500 text-white font-black font-outfit text-xs uppercase tracking-widest rounded-xl shadow-lg shadow-indigo-600/30 active:scale-95 transition-all">
                    Tạo tài khoản miễn phí ✨
                </button>
                <a href="#how-it-works" class="px-6 py-3.5 bg-white/10 hover:bg-white/20 text-white font-bold font-outfit text-xs uppercase tracking-widest rounded-xl border border-white/10 transition-all">
                    Xem cách hoạt động
                </a>
            </div>
        </div>
    </div>
</section>

{{-- Script Điều Khiển Demo Theme Switcher Trực Tiếp Trên Landing Page --}}
<script>
    function setLandingDemoTheme(theme) {
        const screen = document.getElementById('landingPhoneScreen');
        const ring = document.getElementById('landingAvatarRing');
        const highlight = document.getElementById('landingHighlightBtn');
        if (!screen) return;

        if (theme === 'midnight') {
            screen.className = 'bg-slate-900 h-[500px] rounded-[34px] p-5 flex flex-col items-center text-center overflow-hidden border border-white/10 relative transition-all duration-500';
            if (ring) ring.className = 'w-16 h-16 rounded-2xl bg-gradient-to-tr from-indigo-500 to-violet-500 p-0.5 shadow-lg transition-all duration-300';
            if (highlight) highlight.className = 'w-full py-2.5 px-3.5 bg-gradient-to-r from-indigo-500/30 to-violet-500/30 backdrop-blur-md rounded-xl text-white text-xs font-bold border border-indigo-400/30 flex items-center justify-between transition-all group/btn cursor-pointer';
        } else if (theme === 'aurora') {
            screen.className = 'bg-gradient-to-b from-indigo-950 via-purple-950 to-slate-950 h-[500px] rounded-[34px] p-5 flex flex-col items-center text-center overflow-hidden border border-indigo-500/30 relative transition-all duration-500';
            if (ring) ring.className = 'w-16 h-16 rounded-2xl bg-gradient-to-tr from-fuchsia-500 to-indigo-500 p-0.5 shadow-lg transition-all duration-300';
            if (highlight) highlight.className = 'w-full py-2.5 px-3.5 bg-gradient-to-r from-fuchsia-500/30 to-indigo-500/30 backdrop-blur-md rounded-xl text-white text-xs font-bold border border-fuchsia-400/30 flex items-center justify-between transition-all group/btn cursor-pointer';
        } else if (theme === 'emerald') {
            screen.className = 'bg-gradient-to-b from-emerald-950 via-teal-950 to-slate-950 h-[500px] rounded-[34px] p-5 flex flex-col items-center text-center overflow-hidden border border-emerald-500/30 relative transition-all duration-500';
            if (ring) ring.className = 'w-16 h-16 rounded-2xl bg-gradient-to-tr from-emerald-400 to-teal-500 p-0.5 shadow-lg transition-all duration-300';
            if (highlight) highlight.className = 'w-full py-2.5 px-3.5 bg-gradient-to-r from-emerald-500/30 to-teal-500/30 backdrop-blur-md rounded-xl text-white text-xs font-bold border border-emerald-400/30 flex items-center justify-between transition-all group/btn cursor-pointer';
        } else if (theme === 'sunset') {
            screen.className = 'bg-gradient-to-b from-rose-950 via-pink-950 to-slate-950 h-[500px] rounded-[34px] p-5 flex flex-col items-center text-center overflow-hidden border border-rose-500/30 relative transition-all duration-500';
            if (ring) ring.className = 'w-16 h-16 rounded-2xl bg-gradient-to-tr from-rose-400 to-amber-500 p-0.5 shadow-lg transition-all duration-300';
            if (highlight) highlight.className = 'w-full py-2.5 px-3.5 bg-gradient-to-r from-rose-500/30 to-amber-500/30 backdrop-blur-md rounded-xl text-white text-xs font-bold border border-rose-400/30 flex items-center justify-between transition-all group/btn cursor-pointer';
        }
    }
</script>
