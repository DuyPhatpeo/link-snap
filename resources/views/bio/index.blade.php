@extends('layouts.app')

@section('title', 'Quản lý Bio Pages - LinkSnap')

@section('content')
<div class="min-h-screen pt-3 pb-16">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        
        {{-- Header Section --}}
        <div class="mb-6 animate-in fade-in duration-500">
            <div class="flex items-center gap-2 mb-1.5">
                <span class="px-2.5 py-0.5 bg-indigo-50 text-indigo-600 text-[9px] font-black font-outfit uppercase tracking-widest rounded-full border border-indigo-100">Bio Studio</span>
            </div>
            <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4">
                <div class="space-y-0.5">
                    <h1 class="text-2xl sm:text-3xl font-black font-outfit text-slate-900 tracking-tight">
                        Trang cá nhân của <span class="text-gradient-aurora">{{ auth()->user()->name }}</span>
                    </h1>
                    <p class="text-slate-500 font-medium text-xs">Quản lý và thiết kế các trang Bio Profile chuyên nghiệp của bạn.</p>
                </div>
                <button onclick="BioManager.openCreateModal()" class="flex items-center justify-center gap-2 bg-gradient-to-r from-indigo-600 to-violet-600 hover:from-indigo-700 hover:to-violet-700 text-white font-bold font-outfit px-5 py-2.5 rounded-full shadow-md shadow-indigo-500/25 transition-all active:scale-95 text-xs uppercase tracking-wider whitespace-nowrap">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4" /></svg>
                    Tạo Bio Page mới
                </button>
            </div>
        </div>

        {{-- Danh sách Bio Pages --}}
        @if($bioPages->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($bioPages as $page)
                    @include('bio.partials.bio-card', ['page' => $page])
                @endforeach
            </div>
        @else
            <div class="glass-card rounded-2xl p-8 sm:p-12 text-center border-2 border-dashed border-slate-200 flex flex-col items-center">
                <div class="w-14 h-14 bg-indigo-50 rounded-2xl flex items-center justify-center text-indigo-600 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                </div>
                <h2 class="text-lg sm:text-xl font-black font-outfit text-slate-900 mb-1">Bạn chưa có Bio Page nào</h2>
                <p class="text-slate-500 max-w-sm mx-auto mb-6 font-medium text-xs leading-relaxed">Tạo một trang profile duy nhất để gắn lên bio Instagram, TikTok và chia sẻ tất cả các liên kết của bạn.</p>
                <button onclick="BioManager.openCreateModal()" class="bg-gradient-to-r from-indigo-600 to-violet-600 hover:from-indigo-700 hover:to-violet-700 text-white font-bold font-outfit px-7 py-3 rounded-full shadow-md shadow-indigo-500/25 transition-all active:scale-95 uppercase tracking-wider text-xs">
                    Tạo Bio Page đầu tiên ✨
                </button>
            </div>
        @endif

    </div>
</div>

{{-- Modal tạo Bio Page --}}
@include('bio.partials.create-modal')
@endsection

@push('scripts')
<script src="{{ asset('js/bio-manager.js') }}" defer></script>
@endpush
