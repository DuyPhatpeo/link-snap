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
                <div class="relative w-[260px] sm:w-[300px] bg-slate-950 rounded-[44px] p-2.5 shadow-2xl border-4 border-slate-800 transform -rotate-1 hover:rotate-0 transition-transform duration-500">
                    <div class="bg-slate-900 h-[480px] rounded-[34px] p-5 flex flex-col items-center text-center overflow-hidden border border-white/10">
                        <div class="w-14 h-14 rounded-full bg-indigo-600 p-0.5 mb-2.5 shadow-md">
                            <img src="{{ asset('logo.png') }}" class="w-full h-full object-cover rounded-full bg-white p-1">
                        </div>
                        <h4 class="text-white font-black font-outfit text-sm">@creator_pro</h4>
                        <p class="text-indigo-200/70 text-[10px] mb-4">Nhiếp ảnh gia & Content Creator</p>
                        
                        <div class="w-full space-y-2">
                            <div class="w-full py-2.5 px-3.5 bg-white/10 hover:bg-white/20 backdrop-blur-md rounded-xl text-white text-xs font-bold border border-white/10 flex items-center justify-between transition-all">
                                <span>🎥 Kênh YouTube của mình</span>
                                <span>&rarr;</span>
                            </div>
                            <div class="w-full py-2.5 px-3.5 bg-white/10 hover:bg-white/20 backdrop-blur-md rounded-xl text-white text-xs font-bold border border-white/10 flex items-center justify-between transition-all">
                                <span>📸 Instagram Portfolio</span>
                                <span>&rarr;</span>
                            </div>
                            <div class="w-full py-2.5 px-3.5 bg-white/10 hover:bg-white/20 backdrop-blur-md rounded-xl text-white text-xs font-bold border border-white/10 flex items-center justify-between transition-all">
                                <span>💼 Liên hệ hợp tác kinh doanh</span>
                                <span>&rarr;</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Nội dung giới thiệu --}}
        <div class="space-y-4 text-center lg:text-left">
            <div class="inline-flex items-center gap-2 px-3 py-1 bg-indigo-50 rounded-full border border-indigo-100">
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
    <div class="rounded-3xl bg-indigo-600 p-7 sm:p-10 text-center text-white shadow-lg relative overflow-hidden">
        <h2 class="text-2xl sm:text-4xl font-black font-outfit mb-3 tracking-tight">Bắt đầu trải nghiệm ngay hôm nay</h2>
        <p class="text-indigo-100 text-xs sm:text-sm max-w-lg mx-auto mb-6 font-medium">Hoàn toàn miễn phí, không giới hạn lượt click và tích hợp đầy đủ công cụ theo dõi số liệu.</p>
        <div class="flex flex-wrap justify-center gap-3">
            <button onclick="Modal.open('registerModal')" class="px-8 py-3.5 bg-white text-indigo-600 hover:bg-slate-50 font-black font-outfit text-xs uppercase tracking-widest rounded-full shadow-md active:scale-95 transition-all">
                Tạo tài khoản miễn phí
            </button>
        </div>
    </div>
</section>
