{{-- Tab: Quản lý liên kết & Biểu tượng mạng xã hội --}}
<div id="tab-links" class="tab-content transition-all duration-300">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
        <div class="space-y-1">
            <h2 class="text-xl sm:text-2xl font-black font-outfit text-slate-800 tracking-tight">Quản lý liên kết</h2>
            <p class="text-slate-400 font-medium text-xs">Dễ dàng thêm, sửa hoặc kéo thả thay đổi vị trí các liên kết của bạn.</p>
        </div>
        <button onclick="Editor.openLinkModal()" class="w-full sm:w-auto flex items-center justify-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white font-bold font-outfit px-6 py-3 rounded-2xl shadow-sm transition-all active:scale-95 text-xs uppercase tracking-wider">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" /></svg>
            Thêm link mới
        </button>
    </div>

    @php
        $socialLinks = $bioPage->links->where('type', 'social_icon');
        $buttonLinks = $bioPage->links->where('type', 'button');
    @endphp

    {{-- Social Icons Section --}}
    <div class="mb-6">
        <div class="flex items-center gap-3 mb-3">
            <div class="flex items-center gap-2">
                <div class="w-2 h-2 rounded-full bg-indigo-500"></div>
                <span class="text-[10px] font-black text-slate-500 uppercase tracking-widest">Biểu tượng mạng xã hội</span>
            </div>
            <div class="flex-1 h-px bg-slate-100"></div>
            <span class="text-[10px] font-bold text-slate-400">{{ $socialLinks->count() }}</span>
        </div>

        <div id="socialIconsList" class="space-y-2.5">
            @forelse($socialLinks as $link)
            <div data-sort-id="{{ $link->id }}" class="group flex items-center gap-3.5 bg-white p-3.5 sm:p-4 rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-md hover:border-indigo-200 transition-all">
                <div class="drag-handle cursor-move text-slate-300 group-hover:text-slate-500 transition-colors p-1 -ml-1 shrink-0" title="Kéo để đổi vị trí">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 8h16M4 16h16" /></svg>
                </div>
                <div class="w-9 h-9 flex items-center justify-center bg-indigo-50 text-indigo-600 rounded-xl shrink-0">
                    @if($link->icon)
                        <div class="w-5 h-5">{!! $link->icon !!}</div>
                    @else
                        <svg class="w-4 h-4 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.826a4 4 0 015.656 0l4 4a4 4 0 01-5.656 5.656l-1.1-1.1"/></svg>
                    @endif
                </div>
                <div class="flex-1 min-w-0">
                    <h4 class="font-bold font-outfit text-slate-800 text-sm truncate">{{ $link->label }}</h4>
                    <p class="text-slate-400 text-[10px] font-mono truncate mt-0.5">{{ $link->url }}</p>
                </div>
                <div class="flex items-center gap-1 shrink-0">
                    <button data-id="{{ $link->id }}" data-label="{{ $link->label }}" data-url="{{ $link->url }}" data-type="{{ $link->type }}" data-icon="{{ $link->icon }}"
                        onclick="Editor.openEditModal(this)"
                        class="p-2 text-slate-400 hover:text-indigo-600 bg-slate-50 hover:bg-indigo-50 rounded-xl transition-all" title="Chỉnh sửa">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg>
                    </button>
                    <button onclick="Editor.deleteLink('{{ $link->id }}')"
                        class="p-2 text-slate-400 hover:text-rose-500 bg-slate-50 hover:bg-rose-50 rounded-xl transition-all" title="Xóa">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                    </button>
                </div>
            </div>
            @empty
            <div class="bg-slate-50/70 rounded-2xl p-5 text-center border border-dashed border-slate-200">
                <p class="text-slate-400 text-xs font-semibold">Chưa có icon mạng xã hội nào.</p>
            </div>
            @endforelse
        </div>
    </div>

    {{-- Button Links Section --}}
    <div>
        <div class="flex items-center gap-3 mb-3">
            <div class="flex items-center gap-2">
                <div class="w-2 h-2 rounded-full bg-violet-500"></div>
                <span class="text-[10px] font-black text-slate-500 uppercase tracking-widest">Danh sách nút bấm</span>
            </div>
            <div class="flex-1 h-px bg-slate-100"></div>
            <span class="text-[10px] font-bold text-slate-400">{{ $buttonLinks->count() }}</span>
        </div>

        <div id="buttonLinksList" class="space-y-2.5">
            @forelse($buttonLinks as $link)
            <div data-sort-id="{{ $link->id }}" class="group flex items-center gap-3.5 bg-white p-3.5 sm:p-4 rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-md hover:border-violet-200 transition-all">
                <div class="drag-handle cursor-move text-slate-300 group-hover:text-slate-500 transition-colors p-1 -ml-1 shrink-0" title="Kéo để đổi vị trí">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 8h16M4 16h16" /></svg>
                </div>
                <div class="w-9 h-9 flex items-center justify-center bg-violet-50 text-violet-600 rounded-xl shrink-0">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.826a4 4 0 015.656 0l4 4a4 4 0 01-5.656 5.656l-1.1-1.1"/></svg>
                </div>
                <div class="flex-1 min-w-0">
                    <h4 class="font-bold font-outfit text-slate-800 text-sm truncate">{{ $link->label }}</h4>
                    <p class="text-slate-400 text-[10px] font-mono truncate mt-0.5">{{ $link->url }}</p>
                </div>
                <div class="flex items-center gap-1 shrink-0">
                    <button data-id="{{ $link->id }}" data-label="{{ $link->label }}" data-url="{{ $link->url }}" data-type="{{ $link->type }}" data-icon="{{ $link->icon }}"
                        onclick="Editor.openEditModal(this)"
                        class="p-2 text-slate-400 hover:text-indigo-600 bg-slate-50 hover:bg-indigo-50 rounded-xl transition-all" title="Chỉnh sửa">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg>
                    </button>
                    <button onclick="Editor.deleteLink('{{ $link->id }}')"
                        class="p-2 text-slate-400 hover:text-rose-500 bg-slate-50 hover:bg-rose-50 rounded-xl transition-all" title="Xóa">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                    </button>
                </div>
            </div>
            @empty
            <div class="bg-slate-50/70 rounded-2xl p-5 text-center border border-dashed border-slate-200">
                <p class="text-slate-400 text-xs font-semibold">Chưa có nút bấm nào.</p>
            </div>
            @endforelse
        </div>
    </div>
</div>
