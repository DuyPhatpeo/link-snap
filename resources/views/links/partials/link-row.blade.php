{{-- Link Table Row Component --}}
<tr class="hover:bg-indigo-50/20 transition-colors group">
    <td class="px-5 sm:px-6 py-4 max-w-sm">
        <div class="flex flex-col gap-1">
            <div class="flex items-center gap-2">
                <a href="{{ url($link->short_code) }}" target="_blank" class="text-indigo-600 font-bold font-mono text-sm sm:text-base hover:text-indigo-800 hover:underline underline-offset-4 decoration-2 truncate">
                    {{ str_replace(['http://', 'https://'], '', url($link->short_code)) }}
                </a>
                <button onclick="Utils.copyToClipboard('{{ url($link->short_code) }}', this)" class="text-slate-300 hover:text-indigo-600 transition-colors p-1" title="Sao chép">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" /></svg>
                </button>
            </div>
            <span class="text-[11px] font-medium text-slate-400 truncate block" title="{{ $link->original_url }}">
                {{ str_replace(['http://', 'https://'], '', $link->original_url) }}
            </span>
        </div>
    </td>
    <td class="px-5 sm:px-6 py-4 text-center">
        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-indigo-50 text-indigo-700 rounded-lg font-bold font-outfit text-xs border border-indigo-100/80">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.042 21.672 13.684 16.6m0 0-2.51 2.225.569-9.47 5.227 7.917-3.286-.672ZM12 2.25V4.5m5.834.166-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243-1.59-1.59" /></svg>
            {{ number_format($link->clicks) }}
        </span>
    </td>
    <td class="px-5 sm:px-6 py-4 text-center">
        <span class="text-[10px] font-bold text-slate-400 font-mono bg-slate-100/80 px-2.5 py-1 rounded-lg border border-slate-200/60">
            {{ $link->created_at->format('d/m/Y') }}
        </span>
    </td>
    <td class="px-5 sm:px-6 py-4">
        <div class="flex items-center justify-end gap-1.5">
            <button onclick="LinkManager.toggleStatus('{{ $link->short_code }}', this)" 
                class="p-2 rounded-lg transition-all shadow-sm active:scale-90 border {{ $link->is_active ? 'bg-emerald-50 text-emerald-600 hover:bg-emerald-600 hover:text-white border-emerald-100' : 'bg-rose-50 text-rose-500 hover:bg-rose-500 hover:text-white border-rose-100' }}" 
                title="{{ $link->is_active ? 'Đang hoạt động (Nhấn để khóa)' : 'Bị khóa (Nhấn để bật)' }}">
                @if($link->is_active)
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z" /></svg>
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                @endif
            </button>
            <a href="{{ route('links.show', $link->short_code) }}" class="p-2 rounded-lg bg-slate-50 text-slate-500 hover:bg-indigo-50 hover:text-indigo-600 border border-slate-200/60 transition-all shadow-sm active:scale-90" title="Xem thống kê">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" /></svg>
            </a>
            <button onclick="LinkManager.showQR('{{ url($link->short_code) }}')" class="p-2 rounded-lg bg-slate-50 text-slate-500 hover:bg-indigo-50 hover:text-indigo-600 border border-slate-200/60 transition-all shadow-sm active:scale-90" title="Mã QR">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm14 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" /></svg>
            </button>
            <button onclick="LinkManager.deleteLink('{{ $link->short_code }}')" class="p-2 rounded-lg bg-rose-50 text-rose-500 hover:bg-rose-500 hover:text-white border border-rose-100 transition-all shadow-sm active:scale-90" title="Xóa liên kết">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
            </button>
        </div>
    </td>
</tr>
