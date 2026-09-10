{{-- Modal Thêm/Sửa Link Bio --}}
<div id="linkModal" class="fixed inset-0 z-[100] hidden overflow-y-auto bg-slate-900/60 backdrop-blur-sm animate-in fade-in duration-200">
    <div onclick="if(event.target===this) Editor.closeLinkModal()" class="flex min-h-full items-center justify-center p-4">
        <div class="relative w-full max-w-lg bg-white/95 backdrop-blur-2xl rounded-2xl shadow-2xl p-6 sm:p-8 border border-slate-200/90 animate-in zoom-in-95 duration-200">
            
            {{-- Nút đóng modal --}}
            <button onclick="Editor.closeLinkModal()" type="button" aria-label="Đóng"
                class="absolute top-5 right-5 text-slate-400 hover:text-slate-700 bg-slate-100 hover:bg-slate-200 w-8 h-8 rounded-lg flex items-center justify-center transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            {{-- Tiêu đề --}}
            <div class="mb-6">
                <div class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-md text-[10px] font-bold uppercase tracking-wider bg-indigo-50 text-indigo-700 border border-indigo-100 mb-2">
                    <span class="w-1.5 h-1.5 rounded-sm bg-indigo-500"></span>
                    Bio Link Studio
                </div>
                <h2 id="modalTitle" class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight font-heading">
                    Thêm liên kết
                </h2>
                <p class="text-slate-400 font-medium text-xs mt-0.5">Tùy biến liên kết xuất hiện trên trang Bio của bạn.</p>
            </div>

            <form id="linkForm" onsubmit="Editor.saveLink(event)" class="space-y-4">
                @csrf
                <input type="hidden" name="link_id" id="linkIdInput">

                {{-- Ô URL --}}
                <div>
                    <label for="linkUrl" class="block text-[11px] font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        Đường dẫn URL <span class="text-rose-500">*</span>
                    </label>
                    <div class="relative flex items-center">
                        <div class="absolute left-3.5 text-indigo-500 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.826a4 4 0 015.656 0l4 4a4 4 0 01-5.656 5.656l-1.1-1.1" />
                            </svg>
                        </div>
                        <input type="url" name="url" id="linkUrl" required
                            placeholder="https://facebook.com, youtube.com,..."
                            class="w-full bg-slate-50/70 border border-slate-200 py-3 pl-10 pr-4 rounded-xl text-slate-800 font-semibold text-xs sm:text-sm outline-none transition-all focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-50">
                    </div>
                    {{-- Badge thông báo nhận diện nền tảng tự động --}}
                    <div id="detectedBadge" class="hidden mt-2 inline-flex items-center gap-1.5 px-2.5 py-1 bg-emerald-50 text-emerald-700 border border-emerald-200/80 rounded-md text-[11px] font-bold">
                        <span class="w-1.5 h-1.5 rounded-sm bg-emerald-500"></span>
                        <span id="detectedText">Đã nhận diện nền tảng</span>
                    </div>
                </div>

                {{-- Ô Tên hiển thị --}}
                <div>
                    <label for="linkLabel" class="block text-[11px] font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        Tên hiển thị <span class="text-rose-500">*</span>
                    </label>
                    <div class="relative flex items-center">
                        <div class="absolute left-3.5 text-slate-400 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                            </svg>
                        </div>
                        <input type="text" name="label" id="linkLabel" required
                            placeholder="Ví dụ: Kênh YouTube của tôi, Trang Facebook cá nhân..."
                            class="w-full bg-slate-50/70 border border-slate-200 py-3 pl-10 pr-4 rounded-xl text-slate-800 font-semibold text-xs sm:text-sm outline-none transition-all focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-50">
                    </div>
                </div>

                {{-- Lựa chọn kiểu hiển thị --}}
                <div class="pt-1">
                    <label class="block text-[11px] font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        Kiểu hiển thị trên trang Bio
                    </label>
                    <div class="grid grid-cols-2 gap-1.5 p-1 bg-slate-100/90 rounded-xl border border-slate-200/80">
                        <button type="button" onclick="Editor.setType('button')" id="type-btn-button"
                            class="flex items-center justify-center gap-2 py-2.5 px-3 rounded-lg text-xs font-bold transition-all text-slate-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-indigo-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="6" width="18" height="12" rx="2" />
                            </svg>
                            <span>Nút bấm lớn</span>
                        </button>
                        <button type="button" onclick="Editor.setType('social_icon')" id="type-btn-social_icon"
                            class="flex items-center justify-center gap-2 py-2.5 px-3 rounded-lg text-xs font-bold transition-all text-slate-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-violet-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.826a4 4 0 015.656 0l4 4a4 4 0 01-5.656 5.656l-1.1-1.1" />
                            </svg>
                            <span>Icon mạng xã hội</span>
                        </button>
                    </div>
                    <input type="hidden" name="type" id="linkType" value="button">
                    <input type="hidden" name="icon" id="linkIcon">
                </div>

                {{-- Nút hành động --}}
                <div class="pt-2">
                    <button type="submit" id="modalSubmitBtn"
                        class="w-full inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl font-bold font-outfit text-xs uppercase tracking-wider text-white bg-indigo-600 hover:bg-indigo-700 shadow-md shadow-indigo-500/20 active:scale-[0.98] transition-all">
                        <span>Lưu liên kết</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
