@extends('layouts.app')

@section('title', $link->title ?? 'Đang chuyển hướng...')

{{-- Set Social Preview Tags --}}
@section('og_title', $link->title ?? 'LinkSnap - Rút gọn liên kết')
@section('og_description', $link->description ?? 'Đang chuyển hướng đến URL gốc an toàn qua LinkSnap...')
@section('og_image', $link->thumbnail ?? asset('logo.png'))

@section('content')
<div class="min-h-[70vh] flex flex-col items-center justify-center px-4 py-12 text-center">
    <div class="max-w-lg w-full animate-in fade-in zoom-in-95 duration-500">
        
        {{-- Card chính --}}
        <div class="glass-card rounded-2xl sm:rounded-3xl p-8 sm:p-12 shadow-xl border border-slate-200/80 relative overflow-hidden">
            
            {{-- Accent Glow --}}
            <div class="absolute -top-12 -right-12 w-36 h-36 bg-gradient-to-br from-indigo-500/10 to-violet-500/10 rounded-full blur-2xl pointer-events-none"></div>

            {{-- Thumbnail hoặc Icon chuyển hướng --}}
            @if($link->thumbnail)
                <div class="mb-6 relative inline-block group">
                    <div class="absolute -inset-2 bg-gradient-to-r from-indigo-500/20 to-violet-500/20 rounded-2xl blur-lg group-hover:from-indigo-500/30 group-hover:to-violet-500/30 transition-all"></div>
                    <img src="{{ $link->thumbnail }}" alt="Thumbnail" class="relative w-28 h-28 sm:w-36 sm:h-36 object-cover rounded-2xl shadow-lg border-2 border-white">
                </div>
            @else
                <div class="w-20 h-20 rounded-2xl bg-indigo-50 border border-indigo-100 flex items-center justify-center mb-6 mx-auto shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9 text-indigo-600 animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.826a4 4 0 015.656 0l4 4a4 4 0 01-5.656 5.656l-1.1-1.1" />
                    </svg>
                </div>
            @endif

            {{-- Badge --}}
            <div class="mb-3">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-bold uppercase tracking-wider bg-indigo-50 text-indigo-700 border border-indigo-100">
                    <span class="w-1.5 h-1.5 rounded-full bg-indigo-500 animate-ping"></span>
                    Đang chuyển hướng an toàn
                </span>
            </div>

            <h1 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight font-heading mb-3">
                {{ $link->title ?? 'Đang chuẩn bị đưa bạn đến trang đích...' }}
            </h1>
            
            <p class="text-slate-500 text-sm font-medium mb-8 max-w-sm mx-auto line-clamp-2">
                {{ $link->description ?? 'Vui lòng đợi trong giây lát, hệ thống LinkSnap đang kết nối an toàn.' }}
            </p>

            {{-- Thanh tiến trình Loading bar --}}
            <div class="w-56 sm:w-64 h-2 bg-slate-100 rounded-full mx-auto overflow-hidden relative mb-4">
                <div class="absolute inset-y-0 left-0 bg-indigo-600 w-1/3 rounded-full animate-[loading_1.4s_infinite_ease-in-out]"></div>
            </div>
            
            <p class="text-xs font-semibold text-slate-400">
                Tự động chuyển tiếp sau 2 giây...
            </p>

            {{-- Direct link if user is impatient --}}
            <div class="mt-6 pt-5 border-t border-slate-100">
                <a href="{{ $link->original_url }}" class="inline-flex items-center gap-1 text-xs font-semibold text-indigo-600 hover:text-indigo-700 transition-colors">
                    <span>Nhấn vào đây nếu không tự chuyển hướng</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>
        </div>

    </div>
</div>

<style>
    @keyframes loading {
        0% { left: -40%; width: 40%; }
        50% { left: 40%; width: 60%; }
        100% { left: 100%; width: 40%; }
    }
</style>

<script>
    // Chuyển hướng sau 2 giây
    setTimeout(() => {
        window.location.assign("{{ $link->original_url }}");
    }, 2000);
</script>
@endsection
