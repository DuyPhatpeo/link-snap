<section class="py-8 bg-white/40 backdrop-blur-md rounded-3xl max-w-5xl mx-auto px-4 sm:px-6 my-6 border border-slate-200/50">
    <div class="max-w-3xl mx-auto">
        {{-- Section Header --}}
        <div class="text-center mb-6">
            <h2 class="text-2xl sm:text-3xl font-black font-outfit text-slate-900 tracking-tight mb-2">Câu hỏi thường gặp</h2>
            <p class="text-slate-500 font-medium text-xs sm:text-sm">Mọi thứ bạn cần biết về hệ thống rút gọn link LinkSnap.</p>
        </div>

        {{-- Accordion List --}}
        <div class="space-y-2.5">
            {{-- Question 1 --}}
            <div class="group border border-slate-200/80 rounded-2xl bg-white/80 overflow-hidden transition-all hover:border-indigo-300">
                <button onclick="this.nextElementSibling.classList.toggle('hidden'); this.querySelector('.arrow').classList.toggle('rotate-180')" class="w-full flex items-center justify-between p-4 sm:p-5 text-left transition-all outline-none">
                    <span class="text-sm sm:text-base font-black font-outfit text-slate-800 tracking-tight">Liên kết rút gọn có bị hết hạn không?</span>
                    <div class="arrow w-7 h-7 rounded-full bg-slate-50 flex items-center justify-center text-slate-400 transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" /></svg>
                    </div>
                </button>
                <div class="hidden px-5 pb-4 animate-in slide-in-from-top-2 duration-300">
                    <p class="text-slate-500 font-medium text-xs leading-relaxed">Mặc định, các liên kết được tạo trên LinkSnap là <strong>vĩnh viễn</strong> và không bao giờ tự động xóa. Tuy nhiên, nếu bạn là người dùng có tài khoản, bạn có thể tự thiết lập ngày giờ hết hạn cụ thể cho từng link trong phần Cấu hình nâng cao.</p>
                </div>
            </div>

            {{-- Question 2 --}}
            <div class="group border border-slate-200/80 rounded-2xl bg-white/80 overflow-hidden transition-all hover:border-indigo-300">
                <button onclick="this.nextElementSibling.classList.toggle('hidden'); this.querySelector('.arrow').classList.toggle('rotate-180')" class="w-full flex items-center justify-between p-4 sm:p-5 text-left transition-all outline-none">
                    <span class="text-sm sm:text-base font-black font-outfit text-slate-800 tracking-tight">Tính năng bảo mật mật khẩu hoạt động như thế nào?</span>
                    <div class="arrow w-7 h-7 rounded-full bg-slate-50 flex items-center justify-center text-slate-400 transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" /></svg>
                    </div>
                </button>
                <div class="hidden px-5 pb-4 animate-in slide-in-from-top-2 duration-300">
                    <p class="text-slate-500 font-medium text-xs leading-relaxed">Khi bạn đặt mật khẩu cho một liên kết, người truy cập buộc phải nhập đúng mật khẩu mới có thể chuyển hướng đến URL gốc. Hệ thống sử dụng mã hóa hai chiều để bảo mật và cho phép bạn xem lại hoặc đổi mật khẩu bất kỳ lúc nào.</p>
                </div>
            </div>

            {{-- Question 3 --}}
            <div class="group border border-slate-200/80 rounded-2xl bg-white/80 overflow-hidden transition-all hover:border-indigo-300">
                <button onclick="this.nextElementSibling.classList.toggle('hidden'); this.querySelector('.arrow').classList.toggle('rotate-180')" class="w-full flex items-center justify-between p-4 sm:p-5 text-left transition-all outline-none">
                    <span class="text-sm sm:text-base font-black font-outfit text-slate-800 tracking-tight">Tôi có thể thay đổi URL gốc sau khi đã rút gọn không?</span>
                    <div class="arrow w-7 h-7 rounded-full bg-slate-50 flex items-center justify-center text-slate-400 transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" /></svg>
                    </div>
                </button>
                <div class="hidden px-5 pb-4 animate-in slide-in-from-top-2 duration-300">
                    <p class="text-slate-500 font-medium text-xs leading-relaxed">Hoàn toàn được! Nếu bạn đã đăng nhập, bạn có thể vào trang Bảng điều khiển, chọn link cần sửa và cập nhật URL gốc mới mà không làm thay đổi link rút gọn đã chia sẻ.</p>
                </div>
            </div>

            {{-- Question 4 --}}
            <div class="group border border-slate-200/80 rounded-2xl bg-white/80 overflow-hidden transition-all hover:border-indigo-300">
                <button onclick="this.nextElementSibling.classList.toggle('hidden'); this.querySelector('.arrow').classList.toggle('rotate-180')" class="w-full flex items-center justify-between p-4 sm:p-5 text-left transition-all outline-none">
                    <span class="text-sm sm:text-base font-black font-outfit text-slate-800 tracking-tight">Làm thế nào để tùy chỉnh Social Preview (Thumbnail)?</span>
                    <div class="arrow w-7 h-7 rounded-full bg-slate-50 flex items-center justify-center text-slate-400 transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" /></svg>
                    </div>
                </button>
                <div class="hidden px-5 pb-4 animate-in slide-in-from-top-2 duration-300">
                    <p class="text-slate-500 font-medium text-xs leading-relaxed">Trong phần "Tùy chọn nâng cao" khi rút gọn link, bạn có thể nhập Tiêu đề, Mô tả và dán link ảnh Thumbnail. Khi bạn chia sẻ link rút gọn lên Facebook hoặc Zalo, các thông tin này sẽ hiện ra một cách chuyên nghiệp.</p>
                </div>
            </div>
        </div>
    </div>
</section>
