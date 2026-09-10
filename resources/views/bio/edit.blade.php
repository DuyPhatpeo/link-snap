@extends('layouts.app')

@section('title', 'Chỉnh sửa Bio Page - ' . $bioPage->title)

@section('content')
<div class="bg-[#F8F9FB] min-h-screen pb-16">
    {{-- Top Navigation Bar --}}
    <div class="bg-white/80 backdrop-blur-md border-b border-slate-200/80 sticky top-0 z-30 transition-all">
        <div class="max-w-7xl mx-auto px-4 md:px-6 h-16 md:h-18 flex items-center justify-between gap-3">
            <div class="flex items-center gap-3 md:gap-4 min-w-0">
                <a href="{{ route('bio.index') }}" class="w-9 h-9 flex items-center justify-center bg-slate-50 hover:bg-slate-100 rounded-xl text-slate-400 hover:text-slate-900 transition-all border border-slate-200 group shrink-0" title="Quay lại danh sách">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform group-hover:-translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" /></svg>
                </a>
                <div class="h-6 w-px bg-slate-200 shrink-0"></div>
                <div class="min-w-0">
                    <h1 class="text-sm md:text-base font-black font-outfit text-slate-800 tracking-tight truncate">{{ $bioPage->title }}</h1>
                    <div class="hidden sm:flex items-center gap-2 mt-0.5">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                        <p class="text-slate-400 font-bold uppercase tracking-widest text-[9px] font-outfit">Biên tập viên trực tiếp</p>
                    </div>
                </div>
            </div>

            {{-- Tabs Control (Desktop only) --}}
            <div class="hidden md:flex items-center bg-slate-100/80 p-1 rounded-2xl border border-slate-200/60 shrink-0">
                <button onclick="Editor.setTab('links')" id="tab-btn-links" class="tab-btn active px-5 py-2 rounded-xl text-[11px] font-black font-outfit uppercase tracking-wider transition-all">Liên kết</button>
                <button onclick="Editor.setTab('appearance')" id="tab-btn-appearance" class="tab-btn px-5 py-2 rounded-xl text-[11px] font-black font-outfit uppercase tracking-wider transition-all text-slate-400 hover:text-slate-600">Giao diện</button>
                <button onclick="Editor.setTab('settings')" id="tab-btn-settings" class="tab-btn px-5 py-2 rounded-xl text-[11px] font-black font-outfit uppercase tracking-wider transition-all text-slate-400 hover:text-slate-600">Cài đặt</button>
            </div>

            <div class="flex items-center gap-2 shrink-0">
                <a href="{{ route('bio.show', $bioPage->slug) }}" target="_blank" class="flex items-center gap-1.5 text-indigo-600 hover:text-indigo-700 font-black font-outfit text-[11px] uppercase tracking-wider px-3.5 py-2 hover:bg-indigo-50 rounded-xl transition-all border border-indigo-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
                    <span class="hidden sm:inline">Xem trang</span>
                </a>
            </div>
        </div>
    </div>

    {{-- Mobile Tab Bar --}}
    <div class="md:hidden sticky top-16 z-20 bg-white/95 backdrop-blur-md border-b border-slate-200/80 px-4 py-2">
        <div class="flex items-center bg-slate-100/80 p-1 rounded-2xl border border-slate-200/60">
            <button onclick="Editor.setTab('links')" id="tab-btn-links-mobile" class="mobile-tab-btn flex-1 py-2 rounded-xl text-[10px] font-black font-outfit uppercase tracking-wider transition-all bg-white text-slate-800 shadow-sm">Liên kết</button>
            <button onclick="Editor.setTab('appearance')" id="tab-btn-appearance-mobile" class="mobile-tab-btn flex-1 py-2 rounded-xl text-[10px] font-black font-outfit uppercase tracking-wider transition-all text-slate-400">Giao diện</button>
            <button onclick="Editor.setTab('settings')" id="tab-btn-settings-mobile" class="mobile-tab-btn flex-1 py-2 rounded-xl text-[10px] font-black font-outfit uppercase tracking-wider transition-all text-slate-400">Cài đặt</button>
            <button onclick="Editor.setTab('preview')" id="tab-btn-preview-mobile" class="mobile-tab-btn flex-1 py-2 rounded-xl text-[10px] font-black font-outfit uppercase tracking-wider transition-all text-slate-400">Xem trước</button>
        </div>
    </div>

    {{-- Main Editor Layout --}}
    <div class="max-w-7xl mx-auto px-4 md:px-6 py-6 md:py-8">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-start">
            
            {{-- Bảng điều khiển bên trái --}}
            <div class="md:col-span-7 space-y-6">
                @include('bio.partials.tab-links')
                @include('bio.partials.tab-appearance')
                @include('bio.partials.tab-settings')
                @include('bio.partials.tab-preview')
            </div>

            {{-- Khung Mockup Điện thoại bên phải (Desktop Sticky) --}}
            @include('bio.partials.phone-preview')
        </div>
    </div>
</div>

{{-- Modal Thêm/Sửa Link --}}
@include('bio.partials.link-modal')
@endsection

@push('styles')
<style>
    .tab-btn.active { background-color: white; color: #0f172a; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.05); }
    .no-scrollbar::-webkit-scrollbar { display: none; }
    .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
</style>
@endpush

@push('scripts')
<script>
    window.BIO_CONFIG = {
        bioPageId: "{{ $bioPage->slug }}",
        avatarPlaceholder: "{{ asset('avatar-placeholder.png') }}",
        csrfToken: "{{ csrf_token() }}",
        indexRoute: "{{ route('bio.index') }}"
    };
</script>
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.2/Sortable.min.js"></script>
<script src="{{ asset('js/bio-editor.js') }}" defer></script>
@endpush