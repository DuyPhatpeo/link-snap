@guest
<section class="py-6 relative overflow-hidden" id="how-it-works">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 relative z-10">
        
        {{-- Section Header --}}
        <div class="text-center max-w-3xl mx-auto mb-6">
            <div class="inline-flex items-center gap-2 px-3 py-0.5 bg-indigo-50 border border-indigo-100 rounded-md mb-2">
                <span class="text-[9px] font-black font-outfit uppercase tracking-widest text-indigo-600">Hệ Sinh Thái Toàn Diện</span>
            </div>
            <h2 class="text-2xl sm:text-4xl font-black font-outfit text-slate-900 tracking-tight mb-2">
                Tính năng mạnh mẽ. <br>
                <span class="text-gradient-aurora">Trải nghiệm không giới hạn.</span>
            </h2>
            <p class="text-slate-500 font-medium text-xs sm:text-sm leading-relaxed">
                LinkSnap mang đến bộ công cụ toàn diện giúp các cá nhân, doanh nghiệp và nhà sáng tạo nội dung quản lý các điểm chạm liên kết một cách chuyên nghiệp nhất.
            </p>
        </div>

        {{-- Bento Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            
            {{-- Card 1: Thống kê chi tiết (Span 2 cols) --}}
            <div class="md:col-span-2 glass-card rounded-2xl p-5 sm:p-7 border border-slate-200/80 relative overflow-hidden group hover:border-indigo-300 transition-all duration-300">
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-5">
                    <div class="space-y-1.5 max-w-md">
                        <div class="w-9 h-9 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center mb-2 shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <h3 class="text-lg sm:text-xl font-black font-outfit text-slate-900">Phân tích lượt click thời gian thực</h3>
                        <p class="text-slate-500 text-xs leading-relaxed">Biết rõ khách truy cập đến từ quốc gia nào, trình duyệt gì và hệ điều hành nào với độ trễ 0s.</p>
                    </div>
                </div>

                {{-- Interactive Analytics Mini Preview --}}
                <div class="bg-slate-50/90 rounded-xl p-4 border border-slate-200/60">
                    <div class="flex items-center justify-between text-xs font-bold text-slate-500 mb-3">
                        <span class="flex items-center gap-1.5">
                            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                            Lưu lượng 7 ngày gần nhất
                        </span>
                        <div class="flex items-center gap-2">
                            <span class="hidden sm:inline-block text-[10px] text-slate-400 font-mono">Mobile 68% • Desktop 32%</span>
                            <span class="text-emerald-600 bg-emerald-50 border border-emerald-200/50 px-2 py-0.5 rounded-md text-[10px] font-bold">+48.5% tăng trưởng</span>
                        </div>
                    </div>
                    <div class="h-16 flex items-end gap-2 sm:gap-3 pt-1">
                        @php
                            $statsData = [
                                ['day' => 'T2', 'h' => 38],
                                ['day' => 'T3', 'h' => 58],
                                ['day' => 'T4', 'h' => 45],
                                ['day' => 'T5', 'h' => 75],
                                ['day' => 'T6', 'h' => 65],
                                ['day' => 'T7', 'h' => 92],
                                ['day' => 'CN', 'h' => 100],
                            ];
                        @endphp
                        @foreach($statsData as $item)
                        <div class="flex-1 flex flex-col items-center gap-1.5 h-full justify-end group/bar">
                            <div class="w-full bg-indigo-100/60 group-hover/bar:bg-indigo-200 rounded-md relative flex items-end overflow-hidden" style="height: 100%;">
                                <div class="w-full bg-gradient-to-t from-indigo-600 to-indigo-400 rounded-md transition-all group-hover/bar:from-indigo-700 group-hover/bar:to-indigo-500 shadow-sm" style="height: {{ $item['h'] }}%;"></div>
                            </div>
                            <span class="text-[9px] font-mono text-slate-400 group-hover/bar:text-indigo-600 font-semibold">{{ $item['day'] }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Card 2: QR Code Tức thì --}}
            <div class="glass-card rounded-2xl p-5 sm:p-6 border border-slate-200/80 relative overflow-hidden group hover:border-violet-300 transition-all duration-300 flex flex-col justify-between">
                <div>
                    <div class="w-9 h-9 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center mb-2 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
                        </svg>
                    </div>
                    <h3 class="text-base sm:text-lg font-black font-outfit text-slate-900 mb-1">Tạo mã QR tự động</h3>
                    <p class="text-slate-500 text-xs leading-relaxed">Mỗi liên kết được tạo đều đi kèm mã QR độ phân giải cao, hỗ trợ tải về PNG để in ấn hoặc trình chiếu.</p>
                </div>

                <div class="mt-4 flex items-center justify-center">
                    <div class="w-24 h-24 bg-white p-2 rounded-xl border border-slate-200 shadow-md group-hover:scale-105 transition-transform duration-300">
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=https://linksnap.app" alt="QR" class="w-full h-full object-contain rounded-lg">
                    </div>
                </div>
            </div>

            {{-- Card 3: Mật khẩu bảo vệ & Hạn dùng --}}
            <div class="glass-card rounded-2xl p-5 sm:p-6 border border-slate-200/80 relative overflow-hidden group hover:border-amber-300 transition-all duration-300">
                <div class="w-9 h-9 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center mb-2 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <h3 class="text-base sm:text-lg font-black font-outfit text-slate-900 mb-1">Bảo vệ bằng mật khẩu</h3>
                <p class="text-slate-500 text-xs leading-relaxed mb-3">Mã hóa liên kết với mật khẩu tùy chọn hoặc đặt giới hạn số lượt click tối đa.</p>
                <div class="p-2.5 bg-slate-50 rounded-xl border border-slate-200/60 flex items-center gap-2 text-xs font-mono text-slate-500">
                    <span class="text-amber-500">🔒</span>
                    <span>Mật khẩu: ••••••••</span>
                </div>
            </div>

            {{-- Card 4: Tùy biến thẻ xem trước (OG Tags) (Span 2 cols) --}}
            <div class="md:col-span-2 glass-card rounded-2xl p-5 sm:p-7 border border-slate-200/80 relative overflow-hidden group hover:border-cyan-300 transition-all duration-300">
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-6">
                    <div class="space-y-1.5 max-w-sm">
                        <div class="w-9 h-9 rounded-xl bg-cyan-50 text-cyan-600 flex items-center justify-center mb-2 shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-lg sm:text-xl font-black font-outfit text-slate-900">Tùy biến thương hiệu & OpenGraph</h3>
                        <p class="text-slate-500 text-xs leading-relaxed">Thiết lập tiêu đề, mô tả và thumbnail bắt mắt để tối ưu hóa tỷ lệ nhấp chuột (CTR) khi chia sẻ lên mạng xã hội.</p>
                    </div>

                    {{-- Rich OpenGraph Social Card Preview --}}
                    <div class="w-full sm:w-64 bg-white rounded-xl border border-slate-200/90 shadow-md overflow-hidden group/og hover:shadow-lg transition-all shrink-0">
                        {{-- Mock Social Image Header --}}
                        <div class="w-full h-24 bg-gradient-to-tr from-indigo-900 via-indigo-700 to-violet-600 p-3 relative flex flex-col justify-between overflow-hidden">
                            <div class="absolute -right-4 -bottom-4 w-20 h-20 bg-white/10 rounded-full blur-xl"></div>
                            <div class="flex items-center justify-between relative z-10">
                                <span class="text-[8px] font-black uppercase tracking-wider text-white/90 bg-white/20 backdrop-blur-md px-1.5 py-0.5 rounded-sm">OG Preview</span>
                                <div class="flex gap-1">
                                    <span class="w-1.5 h-1.5 rounded-full bg-white/60"></span>
                                    <span class="w-1.5 h-1.5 rounded-full bg-white/60"></span>
                                </div>
                            </div>
                            <div class="relative z-10 flex items-center gap-1.5">
                                <div class="w-5 h-5 rounded-md bg-white p-0.5 shadow-sm flex items-center justify-center">
                                    <img src="{{ asset('logo.png') }}" class="w-3.5 h-3.5 object-contain">
                                </div>
                                <span class="text-[10px] font-bold text-white tracking-tight">LinkSnap Suite</span>
                            </div>
                        </div>
                        {{-- Mock Social Card Content --}}
                        <div class="p-3 bg-white text-left space-y-1">
                            <span class="text-[9px] font-bold uppercase tracking-wider text-indigo-600 font-mono">linksnap.app</span>
                            <h4 class="text-xs font-black font-outfit text-slate-900 line-clamp-1 group-hover/og:text-indigo-600 transition-colors">Tối ưu hóa liên kết & Bio Page 2026</h4>
                            <p class="text-[10px] text-slate-500 line-clamp-2 leading-tight">Giải pháp rút gọn link thương hiệu, gắn mã QR tức thì và theo dõi thống kê lượt truy cập theo thời gian thực.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endguest
