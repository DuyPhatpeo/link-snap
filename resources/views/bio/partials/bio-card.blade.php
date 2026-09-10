{{-- Thẻ hiển thị từng Bio Page trong danh sách --}}
<div class="glass-card rounded-2xl p-4 sm:p-5 border border-slate-200/80 hover:border-indigo-300 hover:shadow-lg transition-all duration-300 group relative cursor-pointer flex flex-col justify-between">
    {{-- Clickable Overlay Link to Edit --}}
    <a href="{{ route('bio.edit', $page->slug) }}" class="absolute inset-0 rounded-2xl z-0" aria-label="Mở trang {{ $page->title }}"></a>

    <div>
        {{-- Card Header: Avatar + Info --}}
        <div class="flex items-center gap-3.5 mb-4">
            <div class="w-11 h-11 rounded-2xl bg-indigo-600 p-[1.5px] shadow-sm shrink-0">
                <div class="w-full h-full bg-white rounded-[14px] flex items-center justify-center overflow-hidden">
                    @if($page->profile_image)
                        <img src="{{ $page->profile_image }}" class="w-full h-full object-cover" alt="{{ $page->title }}">
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                    @endif
                </div>
            </div>
            <div class="min-w-0 flex-1">
                <h3 class="font-bold font-outfit text-slate-900 text-sm sm:text-base leading-tight truncate group-hover:text-indigo-600 transition-colors">{{ $page->title }}</h3>
                <p class="text-indigo-600 font-mono text-[11px] font-semibold mt-0.5 truncate">/b/{{ $page->slug }}</p>
            </div>
        </div>

        @if($page->bio)
        <p class="text-slate-500 text-xs font-medium line-clamp-2 mb-4 leading-relaxed">
            {{ $page->bio }}
        </p>
        @endif
    </div>

    {{-- Card Footer: Links count & Actions --}}
    <div class="relative z-10 flex items-center justify-between pt-3 border-t border-slate-100">
        <div class="flex items-center gap-1.5 text-slate-400 text-xs font-semibold">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.826a4 4 0 015.656 0l4 4a4 4 0 01-5.656 5.656l-1.1-1.1" /></svg>
            <span>{{ $page->links_count }} liên kết</span>
        </div>
        <div class="flex gap-1.5">
            <a href="{{ route('bio.show', $page->slug) }}" target="_blank" class="relative z-20 p-2 bg-slate-50 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-xl transition-all" title="Xem trang">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
            </a>
            <button onclick="event.stopPropagation(); BioManager.deletePage('{{ $page->slug }}')" class="relative z-20 p-2 bg-slate-50 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-xl transition-all" title="Xóa trang">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
            </button>
        </div>
    </div>
</div>
