<section class="py-24 sm:py-32 bg-slate-50/60 relative overflow-hidden">
    {{-- Lines Background --}}
    <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: radial-gradient(#4f46e5 1px, transparent 1px); background-size: 36px 36px;"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 relative z-10">
        {{-- Section Header --}}
        <div class="text-center max-w-2xl mx-auto mb-16 sm:mb-20">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-indigo-50 text-indigo-700 border border-indigo-100 mb-3">
                <span class="w-1.5 h-1.5 rounded-full bg-indigo-500"></span>
                Quy trình tinh gọn
            </span>
            <h2 class="font-heading text-3xl md:text-4xl lg:text-5xl font-black text-slate-900 tracking-tight mb-4">Cách thức hoạt động</h2>
            <p class="text-slate-500 font-medium text-base sm:text-lg">Chỉ với 3 bước đơn giản để biến những liên kết dài dòng thành những mã Snap ngắn gọn, chuyên nghiệp.</p>
        </div>

        {{-- Steps Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 sm:gap-12 relative">
            {{-- Connecting Line (Desktop) --}}
            <div class="hidden md:block absolute top-10 left-0 w-full h-px bg-gradient-to-r from-transparent via-slate-200 to-transparent -translate-y-1/2 -z-10"></div>

            {{-- Step 1 --}}
            <div class="flex flex-col items-center text-center group">
                <div class="w-20 h-20 glass-card rounded-2xl flex items-center justify-center shadow-md border border-slate-200/80 relative group-hover:-translate-y-1.5 transition-transform duration-300">
                    <span class="font-heading text-3xl font-black text-indigo-600">1</span>
                    <div class="absolute -right-2 -top-2 px-2 py-0.5 bg-indigo-600 text-white rounded-full flex items-center justify-center text-[10px] font-black shadow-md">URL</div>
                </div>
                <h3 class="font-heading text-lg sm:text-xl font-black text-slate-900 mt-6 mb-2 tracking-tight">Dán liên kết</h3>
                <p class="text-slate-500 text-sm font-medium leading-relaxed max-w-xs">Sao chép liên kết dài bạn muốn rút gọn và dán vào ô nhập liệu ở đầu trang.</p>
            </div>

            {{-- Step 2 --}}
            <div class="flex flex-col items-center text-center group">
                <div class="w-20 h-20 bg-gradient-to-r from-indigo-600 to-violet-600 rounded-2xl flex items-center justify-center shadow-lg shadow-indigo-500/25 border border-white/20 relative group-hover:-translate-y-1.5 transition-transform duration-300">
                    <span class="font-heading text-3xl font-black text-white">2</span>
                    <div class="absolute -right-2 -top-2 w-7 h-7 bg-white text-indigo-600 rounded-full flex items-center justify-center text-xs font-black shadow-md">✨</div>
                </div>
                <h3 class="font-heading text-lg sm:text-xl font-black text-slate-900 mt-6 mb-2 tracking-tight">Snap & Tùy chỉnh</h3>
                <p class="text-slate-500 text-sm font-medium leading-relaxed max-w-xs">Nhấn "Rút gọn" để hệ thống xử lý. Bạn có thể đặt mật khẩu hoặc tùy chỉnh mã riêng theo ý thích.</p>
            </div>

            {{-- Step 3 --}}
            <div class="flex flex-col items-center text-center group">
                <div class="w-20 h-20 glass-card rounded-2xl flex items-center justify-center shadow-md border border-slate-200/80 relative group-hover:-translate-y-1.5 transition-transform duration-300">
                    <span class="font-heading text-3xl font-black text-indigo-600">3</span>
                    <div class="absolute -right-2 -top-2 w-7 h-7 bg-emerald-500 text-white rounded-full flex items-center justify-center text-xs font-black shadow-md">📈</div>
                </div>
                <h3 class="font-heading text-lg sm:text-xl font-black text-slate-900 mt-6 mb-2 tracking-tight">Chia sẻ & Theo dõi</h3>
                <p class="text-slate-500 text-sm font-medium leading-relaxed max-w-xs">Sử dụng liên kết mới hoặc mã QR để chia sẻ. Truy cập Bảng điều khiển để xem thống kê chi tiết.</p>
            </div>
        </div>
    </div>
</section>
