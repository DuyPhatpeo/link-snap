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
<section class="py-8 relative overflow-hidden">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 grid grid-cols-1 lg:grid-cols-2 gap-8 items-center relative z-10">
        {{-- Mockup Điện thoại --}}
        <div class="flex justify-center">
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

                <div class="absolute top-1/2 -left-8 -translate-y-1/2 z-20 bg-white/90 backdrop-blur-md px-3.5 py-2 rounded-2xl border border-slate-200/80 shadow-xl flex items-center gap-2 hidden sm:flex">
                    <span class="text-sm">🔗</span>
                    <div>
                        <p class="text-[9px] text-slate-400 font-bold uppercase tracking-wider">Đã kết nối</p>
                        <p class="text-xs font-black font-outfit text-slate-900">12 Links</p>
                    </div>
                </div>

                <div class="absolute -bottom-3 -right-4 z-20 bg-white/90 backdrop-blur-md px-3.5 py-2 rounded-2xl border border-slate-200/80 shadow-xl flex items-center gap-2">
                    <span class="text-sm">✨</span>
                    <div>
                        <p class="text-[9px] text-slate-400 font-bold uppercase tracking-wider">Hiệu suất</p>
                        <p class="text-xs font-black font-outfit text-emerald-600">99.8% CTR</p>
                    </div>
                </div>

                {{-- Phone Shell --}}
                <div class="relative w-[270px] sm:w-[310px] bg-slate-950 rounded-[44px] p-2.5 shadow-2xl border-4 border-slate-800 transform -rotate-1 hover:rotate-0 transition-transform duration-500">
                    <div class="bg-slate-900 h-[500px] rounded-[34px] p-5 flex flex-col items-center text-center overflow-hidden border border-white/10 relative">
                        
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
                            <div class="w-16 h-16 rounded-2xl bg-gradient-to-tr from-indigo-500 to-violet-500 p-0.5 shadow-lg">
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

                            <div class="w-full py-2.5 px-3.5 bg-gradient-to-r from-indigo-500/30 to-violet-500/30 hover:from-indigo-500/40 hover:to-violet-500/40 backdrop-blur-md rounded-xl text-white text-xs font-bold border border-indigo-400/30 flex items-center justify-between transition-all group/btn cursor-pointer">
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
                Thay thế danh sách link cồng kềnh trên tiểu sử mạng xã hội. LinkSnap Bio giúp người theo dõi dễ dàng tìm thấy các dự án, video và liên kết của bạn.
            </p>
            <div class="pt-1">
                <button onclick="Modal.open('registerModal')" class="px-7 py-3 bg-slate-900 hover:bg-black text-white font-bold font-outfit text-xs uppercase tracking-widest rounded-2xl shadow-lg hover:shadow-xl transition-all active:scale-95">
                    Tạo Bio Page Miễn Phí &rarr;
                </button>
            </div>
        </div>
    </div>
</section>

{{-- FAQ Section --}}
@include('components.faq')

{{-- Bottom Call to Action --}}
<section class="py-8 max-w-6xl mx-auto px-4 sm:px-6">
    <div class="rounded-2xl bg-indigo-600 p-7 sm:p-10 text-center text-white shadow-lg relative overflow-hidden">
        <h2 class="text-2xl sm:text-4xl font-black font-outfit mb-3 tracking-tight">Bắt đầu trải nghiệm ngay hôm nay</h2>
        <p class="text-indigo-100 text-xs sm:text-sm max-w-lg mx-auto mb-6 font-medium">Hoàn toàn miễn phí, không giới hạn lượt click và tích hợp đầy đủ công cụ theo dõi số liệu.</p>
        <div class="flex flex-wrap justify-center gap-3">
            <button onclick="Modal.open('registerModal')" class="px-8 py-3.5 bg-white text-indigo-600 hover:bg-slate-50 font-black font-outfit text-xs uppercase tracking-widest rounded-xl shadow-md active:scale-95 transition-all">
                Tạo tài khoản miễn phí
            </button>
        </div>
    </div>
</section>
