{{-- TAB: PREVIEW (Mobile Only) --}}
<div id="tab-preview" class="tab-content hidden md:hidden animate-in fade-in slide-in-from-bottom-4 duration-300">
    <div class="glass-card rounded-2xl p-5 shadow-sm border border-slate-200/80">
        <div class="mb-4 flex items-center justify-between">
            <h2 class="text-base font-black font-outfit text-slate-800 tracking-tight">Xem trước di động</h2>
            <button onclick="Editor.refreshPreview()" class="p-2 bg-slate-100 hover:bg-slate-200 text-slate-500 rounded-lg transition-all" title="Làm mới">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" /></svg>
            </button>
        </div>
        <div class="relative mx-auto rounded-[36px] overflow-hidden border-4 border-slate-900 shadow-xl" style="height: 540px; max-width: 290px;">
            <iframe id="previewFrameMobile" src="{{ route('bio.show', $bioPage->slug) }}" class="w-full h-full border-none"></iframe>
        </div>
    </div>
</div>
