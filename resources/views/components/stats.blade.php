<section class="relative z-20 max-w-6xl mx-auto px-4 sm:px-6">
    <div class="glass-card rounded-2xl border border-slate-200/80 p-6 sm:p-8 shadow-lg">
        
        {{-- Section Title --}}
        <div class="text-center mb-6">
            <div class="inline-flex items-center gap-2 px-3 py-0.5 bg-indigo-50 border border-indigo-100 rounded-md mb-2">
                <span class="text-[9px] font-black font-outfit uppercase tracking-widest text-indigo-600">Quy Trình Siêu Tốc</span>
            </div>
            <h2 class="text-xl sm:text-3xl font-black font-outfit text-slate-900 mb-2 tracking-tight">Rút gọn & Chia sẻ chỉ trong 3 bước</h2>
            <p class="text-slate-500 font-medium text-xs sm:text-sm max-w-lg mx-auto leading-relaxed">
                Biến những liên kết dài dòng, phức tạp thành những đường dẫn ngắn gọn, thương hiệu và bảo mật.
            </p>
        </div>

        {{-- 3 Step Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 relative">
            {{-- Step 1 --}}
            <div class="glass-card rounded-2xl p-5 border border-slate-200/80 bg-white/70 flex flex-col justify-between hover:shadow-md transition-all group">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-10 h-10 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center font-black font-outfit text-sm shadow-sm border border-indigo-100/80">
                            01
                        </div>
                        <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Bước 1</span>
                    </div>
                    <h3 class="text-base font-black font-outfit text-slate-900 mb-1">Dán liên kết dài</h3>
                    <p class="text-slate-500 text-xs leading-relaxed font-medium mb-4">Sao chép bất kỳ đường dẫn trang web, video hoặc tài liệu nào bạn muốn chia sẻ.</p>
                </div>
                {{-- Step 1 Visual Mockup --}}
                <div class="bg-slate-50/90 rounded-xl p-2.5 border border-slate-200/60 text-left">
                    <div class="flex items-center gap-2">
                        <svg class="w-3.5 h-3.5 text-slate-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                        </svg>
                        <span class="text-[11px] font-mono text-slate-500 truncate flex-1">https://youtube.com/watch?v=...</span>
                        <span class="text-[9px] font-bold bg-emerald-100 text-emerald-700 px-1.5 py-0.5 rounded-md shrink-0">✓ Hợp lệ</span>
                    </div>
                </div>
            </div>

            {{-- Step 2 --}}
            <div class="glass-card rounded-2xl p-5 border border-slate-200/80 bg-white/70 flex flex-col justify-between hover:shadow-md transition-all group">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center font-black font-outfit text-sm shadow-sm border border-violet-100/80">
                            02
                        </div>
                        <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Bước 2</span>
                    </div>
                    <h3 class="text-base font-black font-outfit text-slate-900 mb-1">Tùy biến & Rút gọn</h3>
                    <p class="text-slate-500 text-xs leading-relaxed font-medium mb-4">Tạo mã riêng theo thương hiệu, đặt mật khẩu bảo vệ hoặc hạn dùng nếu cần.</p>
                </div>
                {{-- Step 2 Visual Mockup --}}
                <div class="bg-violet-50/60 rounded-xl p-2.5 border border-violet-100 text-left flex items-center justify-between">
                    <div class="flex items-center gap-1.5 font-mono text-[11px] text-violet-900 font-bold truncate">
                        <span class="text-violet-500">linksnap.app/</span><span class="text-violet-700 bg-violet-100/80 px-1 py-0.5 rounded">brand2026</span>
                    </div>
                    <div class="flex items-center gap-1 shrink-0">
                        <span class="text-[10px]" title="Bảo vệ mật khẩu">🔒</span>
                        <span class="text-[9px] font-bold bg-violet-200/80 text-violet-800 px-1.5 py-0.5 rounded-md">⚡ QR Sẵn</span>
                    </div>
                </div>
            </div>

            {{-- Step 3 --}}
            <div class="glass-card rounded-2xl p-5 border border-slate-200/80 bg-white/70 flex flex-col justify-between hover:shadow-md transition-all group">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-10 h-10 rounded-xl bg-cyan-50 text-cyan-600 flex items-center justify-center font-black font-outfit text-sm shadow-sm border border-cyan-100/80">
                            03
                        </div>
                        <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Bước 3</span>
                    </div>
                    <h3 class="text-base font-black font-outfit text-slate-900 mb-1">Chia sẻ & Đo lường</h3>
                    <p class="text-slate-500 text-xs leading-relaxed font-medium mb-4">Tải mã QR, gửi link và quan sát biểu đồ lượt click cập nhật theo thời gian thực.</p>
                </div>
                {{-- Step 3 Visual Mockup --}}
                <div class="bg-cyan-50/60 rounded-xl p-2.5 border border-cyan-100 text-left flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <div class="w-2 h-2 rounded-full bg-cyan-500 animate-ping"></div>
                        <span class="text-[11px] font-black font-outfit text-slate-800">1,420 Clicks</span>
                    </div>
                    <span class="text-[9px] font-bold bg-cyan-100 text-cyan-800 px-1.5 py-0.5 rounded-md flex items-center gap-1">
                        <svg class="w-2.5 h-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                        +24.5%
                    </span>
                </div>
            </div>
        </div>

    </div>
</section>
