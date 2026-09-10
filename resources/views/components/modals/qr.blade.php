<!-- Modal Hiển thị Mã QR Code -->
<div id="qrModal" onclick="if(event.target===this) Modal.close('qrModal')" class="fixed inset-0 bg-slate-950/60 backdrop-blur-md z-50 flex items-center justify-center p-4 hidden animate-in zoom-in duration-300">
    <div class="bg-white/95 backdrop-blur-2xl rounded-[36px] p-7 sm:p-9 w-full max-w-sm shadow-2xl border border-white/90 relative flex flex-col items-center text-center gap-5">
        <div class="space-y-1">
            <h3 class="text-xl font-black font-outfit text-slate-900 tracking-tight">Mã QR Code</h3>
            <p class="text-slate-400 text-[11px] font-medium">Quét bằng camera điện thoại để truy cập liên kết tức thì</p>
        </div>

        {{-- Khung hiển thị QR --}}
        <div class="relative w-52 h-52 bg-white rounded-3xl border border-slate-200/80 p-3 shadow-sm group/qr overflow-hidden flex items-center justify-center">
            <img id="qrModalImage" src="" alt="QR Code" class="w-full h-full object-contain rounded-xl">
            {{-- Hover Save Overlay --}}
            <button onclick="LinkManager.saveQR()" class="absolute inset-0 bg-indigo-600/85 opacity-0 group-hover/qr:opacity-100 transition-opacity flex items-center justify-center text-white flex-col gap-2 rounded-3xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" /></svg>
                <span class="text-xs font-bold font-outfit uppercase tracking-wider">Tải về máy</span>
            </button>
        </div>
        
        {{-- Link Rút gọn để Copy --}}
        <div class="w-full bg-slate-50 border border-slate-200/80 rounded-2xl p-3 flex items-center justify-between gap-3 group/link cursor-pointer hover:bg-slate-100 transition-all active:scale-[0.98]" onclick="LinkManager.copyCurrentQRLink()">
            <div class="flex-1 min-w-0 flex flex-col items-start gap-0.5 text-left">
                <span class="text-[9px] font-black text-slate-400 uppercase tracking-widest leading-none">Liên kết ngắn</span>
                <span id="qrShortUrlDisplay" class="text-xs font-bold font-mono text-indigo-600 truncate w-full">...</span>
            </div>
            <div class="bg-white p-2 rounded-xl shadow-sm border border-slate-200 text-slate-400 group-hover/link:text-indigo-600 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                </svg>
            </div>
        </div>

        {{-- Nút Hành động --}}
        <div class="w-full flex items-center gap-2.5">
            <button onclick="LinkManager.shareLink()" class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white font-bold font-outfit py-3 rounded-2xl transition-all shadow-sm uppercase tracking-wider text-xs flex items-center justify-center gap-1.5 active:scale-95">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="h-3.5 w-3.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z" />
                </svg>
                Chia sẻ
            </button>
            <button onclick="LinkManager.saveQR()" class="flex-1 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold font-outfit py-3 rounded-2xl transition-all uppercase tracking-wider text-xs flex items-center justify-center gap-1.5 active:scale-95">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" /></svg>
                Tải ảnh QR
            </button>
        </div>

        <button onclick="Modal.close('qrModal')" class="w-full text-center text-[10px] font-bold text-slate-400 hover:text-rose-500 uppercase tracking-widest transition-colors pt-1">
            Đóng
        </button>
    </div>
</div>
