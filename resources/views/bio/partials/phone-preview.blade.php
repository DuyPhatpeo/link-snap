{{-- Khung Mockup Điện thoại bên phải (Desktop Sticky Live Preview) --}}
<div class="md:col-span-5 md:sticky md:top-24 hidden md:block">
    <div class="text-center mb-3 flex items-center justify-center gap-2">
        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
        <span class="text-[10px] font-black font-outfit text-slate-400 uppercase tracking-widest">Xem trước thời gian thực</span>
    </div>
    <div class="relative mx-auto" style="width: 300px">
        <div class="relative rounded-[48px] p-2.5 shadow-[0_30px_70px_-20px_rgba(0,0,0,0.3),0_0_0_1px_rgba(255,255,255,0.08)] bg-gradient-to-b from-slate-900 to-slate-950">
            <div class="bg-white rounded-[38px] overflow-hidden relative" style="height: 600px">
                <iframe id="previewFrame" src="{{ route('bio.show', $bioPage->slug) }}" class="w-full h-full border-none pointer-events-none"></iframe>
            </div>
        </div>
    </div>
</div>
