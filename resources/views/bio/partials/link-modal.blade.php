{{-- Modal Thêm/Sửa Link Bio --}}
<div id="linkModal" class="fixed inset-0 z-[100] hidden overflow-y-auto bg-slate-900/60 backdrop-blur-sm">
    <div onclick="if(event.target===this) Editor.closeLinkModal()" class="flex min-h-full items-center justify-center p-4">
        <div class="relative w-full max-w-lg glass-card rounded-2xl shadow-2xl p-6 sm:p-9 border border-slate-200/80 animate-in zoom-in-95 duration-300">
            
            {{-- Nút đóng modal --}}
            <button onclick="Editor.closeLinkModal()" type="button" aria-label="Đóng"
                class="absolute top-6 right-6 text-slate-400 hover:text-slate-700 bg-slate-100 hover:bg-slate-200 w-8 h-8 rounded-lg flex items-center justify-center transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            {{-- Tiêu đề --}}
            <div class="mb-5">
                <div class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-[10px] font-bold uppercase tracking-wider bg-indigo-50 text-indigo-700 border border-indigo-100 mb-2">
                    <span class="w-1.5 h-1.5 rounded-sm bg-indigo-500"></span>
                    Bio Link Editor
                </div>
                <h2 id="modalTitle" class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight font-heading">
                    Cấu hình liên kết
                </h2>
            </div>

            <form id="linkForm" onsubmit="Editor.saveLink(event)" class="space-y-5">
                @csrf
                <input type="hidden" name="link_id" id="linkIdInput">

                {{-- Khối thông tin link --}}
                <div class="p-5 bg-slate-50/80 rounded-2xl border border-slate-200/80 space-y-4">
                    <div>
                        <label for="linkUrl" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                            Đường dẫn URL <span class="text-rose-500">*</span>
                        </label>
                        <input type="url" name="url" id="linkUrl" required
                            placeholder="https://..."
                            class="w-full bg-white border border-slate-200 py-3 px-4 rounded-xl text-slate-800 font-semibold text-sm outline-none transition-all focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-100">
                    </div>
                    <div>
                        <label for="linkLabel" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                            Tên hiển thị <span class="text-rose-500">*</span>
                        </label>
                        <input type="text" name="label" id="linkLabel" required
                            placeholder="Ví dụ: Trang cá nhân, Kênh Youtube..."
                            class="w-full bg-white border border-slate-200 py-3 px-4 rounded-xl text-slate-800 font-semibold text-sm outline-none transition-all focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-100">
                    </div>
                </div>

                {{-- Lựa chọn kiểu hiển thị --}}
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                        Kiểu hiển thị
                    </label>
                    <div class="flex p-1 bg-slate-100 rounded-xl border border-slate-200">
                        <button type="button" onclick="Editor.setType('button')" id="type-btn-button"
                            class="flex-1 py-2.5 px-4 rounded-lg text-xs font-bold transition-all text-slate-700">
                            Nút bấm lớn
                        </button>
                        <button type="button" onclick="Editor.setType('social_icon')" id="type-btn-social_icon"
                            class="flex-1 py-2.5 px-4 rounded-lg text-xs font-bold transition-all text-slate-700">
                            Icon mạng xã hội
                        </button>
                    </div>
                    <input type="hidden" name="type" id="linkType" value="button">
                    <input type="hidden" name="icon" id="linkIcon">
                </div>

                {{-- Nút hành động --}}
                <button type="submit" id="modalSubmitBtn"
                    class="w-full inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl font-bold text-sm text-white bg-indigo-600 hover:bg-indigo-700 shadow-sm active:scale-[0.99] transition-all">
                    <span>Lưu liên kết</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
</div>
