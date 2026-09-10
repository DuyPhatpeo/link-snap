{{-- Modal Tạo Bio Page Mới --}}
<div id="createBioModal" class="fixed inset-0 z-[100] hidden overflow-y-auto bg-slate-950/60 backdrop-blur-md">
    <div onclick="if(event.target===this) BioManager.closeCreateModal()" class="flex min-h-full items-center justify-center p-4">
        <div class="relative w-full max-w-lg bg-white/95 backdrop-blur-2xl rounded-2xl shadow-2xl p-6 sm:p-8 border border-white/90 animate-in zoom-in-95 duration-200">
            <button onclick="BioManager.closeCreateModal()" class="absolute top-5 right-5 text-slate-400 hover:text-slate-700 bg-slate-100 hover:bg-slate-200 w-8 h-8 rounded-lg flex items-center justify-center transition-all" aria-label="Đóng">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" /></svg>
            </button>

            <div class="mb-5 text-center">
                <h2 class="text-xl sm:text-2xl font-black font-outfit text-slate-900 tracking-tight mb-1">Tạo Bio Page mới</h2>
                <p class="text-slate-400 font-bold uppercase tracking-widest text-[9px]">Thiết lập trang cá nhân của bạn</p>
            </div>

            <form id="createBioForm" onsubmit="BioManager.handleCreate(event)" class="space-y-3.5">
                @csrf
                <div>
                    <label class="block text-[10px] font-black font-outfit text-slate-400 uppercase tracking-widest mb-1 ml-1">Tiêu đề trang</label>
                    <input type="text" name="title" placeholder="VD: Duy Phát | Creator" required
                        class="w-full bg-slate-50/80 border border-slate-200 rounded-xl py-2.5 px-3.5 text-xs font-semibold text-slate-800 outline-none focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-50 transition-all">
                </div>

                <div>
                    <label class="block text-[10px] font-black font-outfit text-slate-400 uppercase tracking-widest mb-1 ml-1">Đường dẫn Bio (Slug)</label>
                    <div class="flex items-center bg-slate-50/80 border border-slate-200 rounded-xl overflow-hidden focus-within:border-indigo-500 focus-within:bg-white focus-within:ring-4 focus-within:ring-indigo-50 transition-all">
                        <div class="px-3 py-2.5 bg-slate-100/70 border-r border-slate-200 text-[10px] sm:text-[11px] font-mono font-bold text-slate-400 select-none">
                            {{ request()->getHttpHost() }}/b/
                        </div>
                        <input type="text" name="slug" placeholder="username" required
                            class="flex-1 bg-transparent py-2.5 px-3 text-xs font-mono font-bold text-slate-800 outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-[10px] font-black font-outfit text-slate-400 uppercase tracking-widest mb-1 ml-1">Tiểu sử ngắn (Bio)</label>
                    <textarea name="bio" placeholder="Giới thiệu đôi nét về bản thân hoặc dự án..." rows="3"
                        class="w-full bg-slate-50/80 border border-slate-200 rounded-xl py-2.5 px-3.5 text-xs font-semibold text-slate-800 outline-none focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-50 transition-all resize-none"></textarea>
                </div>

                <div class="pt-1.5">
                    <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold font-outfit py-3 rounded-xl shadow-sm uppercase tracking-wider text-xs active:scale-95 transition-all">
                        Tiếp tục thiết lập &rarr;
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
