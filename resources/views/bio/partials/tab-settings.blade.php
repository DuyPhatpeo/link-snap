{{-- Tab: Cài đặt Bio Page & Quản lý nâng cao --}}
<div id="tab-settings" class="tab-content hidden animate-in fade-in slide-in-from-bottom-4 duration-300">
    <section class="glass-card rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-sm">
        <div class="mb-6">
            <h2 class="text-xl sm:text-2xl font-black font-outfit text-slate-800 tracking-tight">Cài đặt trang</h2>
            <p class="text-slate-400 font-medium text-xs mt-1">Quản lý đường dẫn truy cập và quyền riêng tư của Bio Page.</p>
        </div>
        
        <div class="space-y-6">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 p-5 bg-slate-50 rounded-2xl border border-slate-200/80">
                <div class="space-y-1">
                    <h4 class="font-bold font-outfit text-slate-800 text-sm">Đường dẫn Bio công khai</h4>
                    <p class="text-indigo-600 font-mono text-xs font-semibold">{{ request()->getHttpHost() }}/b/{{ $bioPage->slug }}</p>
                </div>
                <button onclick="Editor.copyBioLink(this)" 
                    data-url="{{ route('bio.show', $bioPage->slug) }}"
                    class="bg-white hover:bg-slate-100 text-slate-800 font-bold px-4 py-2 rounded-xl border border-slate-200 text-xs transition-all shadow-sm active:scale-95 whitespace-nowrap">
                    Sao chép link
                </button>
            </div>

            <div class="p-6 border-2 border-dashed border-rose-200 rounded-2xl bg-rose-50/20">
                <h4 class="font-black font-outfit text-rose-600 text-sm uppercase tracking-wider mb-1">Khu vực nguy hiểm</h4>
                <p class="text-slate-500 text-xs font-medium leading-relaxed mb-4">Sau khi xóa Bio Page, toàn bộ liên kết bên trong sẽ bị vô hiệu hóa và không thể khôi phục.</p>
                <button onclick="Editor.deleteBio()" class="bg-rose-500 hover:bg-rose-600 text-white font-bold font-outfit px-6 py-2.5 rounded-xl transition-all active:scale-95 text-xs uppercase tracking-wider shadow-sm shadow-rose-500/20">
                    Xóa Bio Page này
                </button>
            </div>
        </div>
    </section>
</div>
