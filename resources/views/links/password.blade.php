@extends('layouts.app')

@section('title', 'Yêu cầu mật khẩu - LinkSnap')

@section('content')
<div class="min-h-[70vh] flex items-center justify-center px-4 py-12">
    <div class="max-w-md w-full animate-in fade-in zoom-in-95 duration-500">
        {{-- Card chính theo chuẩn glass-card --}}
        <div class="glass-card rounded-2xl sm:rounded-3xl p-8 sm:p-10 shadow-xl border border-slate-200/80 relative overflow-hidden">
            
            {{-- Accent Glow --}}
            <div class="absolute -top-12 -right-12 w-36 h-36 bg-gradient-to-br from-indigo-500/10 to-violet-500/10 rounded-full blur-2xl pointer-events-none"></div>

            {{-- Icon khóa --}}
            <div class="w-16 h-16 rounded-2xl bg-indigo-50 border border-indigo-100 flex items-center justify-center mb-6 mx-auto group shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600 transition-transform group-hover:scale-110" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
            </div>

            <div class="text-center mb-8">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-md text-[11px] font-bold uppercase tracking-wider bg-indigo-50 text-indigo-700 border border-indigo-100 mb-3">
                    <span class="w-1.5 h-1.5 rounded-sm bg-indigo-500 animate-pulse"></span>
                    Bảo vệ bằng mã khóa
                </span>
                <h1 class="text-2xl font-black text-slate-900 tracking-tight font-heading mb-2">Liên kết được bảo vệ</h1>
                <p class="text-slate-500 text-sm font-medium">Vui lòng nhập mật khẩu hợp lệ để tiếp tục truy cập địa chỉ đích.</p>
            </div>

            <form action="{{ route('links.verify', $link->id) }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label for="password" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                        Mật khẩu truy cập
                    </label>
                    <div class="relative">
                        <input type="password" name="password" id="password" required autofocus
                            placeholder="Nhập mật khẩu..."
                            class="w-full bg-white border border-slate-200 py-3.5 px-4 rounded-xl text-slate-800 font-semibold text-sm placeholder:text-slate-400 outline-none transition-all focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-100">
                    </div>
                </div>

                <button type="submit"
                    class="w-full inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl font-bold text-sm text-white bg-indigo-600 hover:bg-indigo-700 shadow-sm active:scale-[0.99] transition-all">
                    <span>Mở khóa & Tiếp tục</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </button>
            </form>

            {{-- Footer card --}}
            <div class="mt-8 pt-6 border-t border-slate-100 text-center">
                <a href="/" class="inline-flex items-center gap-1.5 text-xs font-semibold text-slate-500 hover:text-indigo-600 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    <span>Quay lại trang chủ LinkSnap</span>
                </a>
            </div>
        </div>

        {{-- Footer subtext --}}
        <p class="mt-6 text-center text-xs font-medium text-slate-400">
            Được bảo vệ bởi giao thức mã hóa mật khẩu an toàn LinkSnap
        </p>
    </div>
</div>
@endsection
