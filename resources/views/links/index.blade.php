@extends('layouts.app')

@section('title', 'Danh sách liên kết - LinkSnap')

@section('content')
<div class="min-h-screen pt-6 sm:pt-8 pb-20">
    <div class="max-w-7xl mx-auto px-3 sm:px-6">
        
        {{-- Header Section --}}
        <div class="glass-card rounded-2xl p-5 sm:p-7 border border-slate-200/80 shadow-sm mb-6 flex flex-col md:flex-row md:items-end justify-between gap-5 animate-in fade-in duration-500">
            <div class="space-y-1.5">
                <nav class="flex items-center gap-2 text-[10px] font-black uppercase tracking-wider text-slate-400">
                    <a href="/" class="hover:text-indigo-600 transition-colors">Trang chủ</a>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" /></svg>
                    <span class="text-indigo-600 font-black">Liên kết</span>
                </nav>
                <div class="flex items-center gap-2.5">
                    <span class="px-2.5 py-0.5 bg-indigo-50 text-indigo-600 text-[9px] font-black font-outfit uppercase tracking-widest rounded-full border border-indigo-100">Liên kết rút gọn</span>
                </div>
                <h1 class="text-2xl sm:text-3xl font-black font-outfit text-slate-900 tracking-tight">Tất cả liên kết</h1>
                <p class="text-slate-500 font-medium text-xs">Quản lý, phân tích và theo dõi hiệu suất toàn bộ liên kết của bạn.</p>
            </div>

            {{-- Search Bar --}}
            <div class="w-full md:w-80">
                <form action="{{ route('links.index') }}" method="GET" class="relative group">
                    <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-indigo-600 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input type="text" name="search" id="searchInput" value="{{ request('search') }}" placeholder="Tìm kiếm link hoặc mã..." 
                        class="w-full bg-white/90 border border-slate-200/80 py-2.5 pl-10 pr-4 rounded-xl outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-50 transition-all font-semibold text-slate-700 text-xs shadow-sm placeholder:text-slate-400">
                </form>
            </div>
        </div>

        {{-- Table Section --}}
        <div class="glass-card rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden animate-in fade-in duration-500 delay-100">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50/70 border-b border-slate-200/80">
                            <th class="px-5 sm:px-6 py-4 text-[10px] font-black font-outfit uppercase tracking-wider text-slate-400 whitespace-nowrap">Thông tin liên kết</th>
                            <th class="px-5 sm:px-6 py-4 text-[10px] font-black font-outfit uppercase tracking-wider text-slate-400 text-center whitespace-nowrap">Lượt Click</th>
                            <th class="px-5 sm:px-6 py-4 text-[10px] font-black font-outfit uppercase tracking-wider text-slate-400 text-center whitespace-nowrap">Ngày tạo</th>
                            <th class="px-5 sm:px-6 py-4 text-[10px] font-black font-outfit uppercase tracking-wider text-slate-400 text-right whitespace-nowrap">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($links as $link)
                            @include('links.partials.link-row', ['link' => $link])
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-16 text-center">
                                <div class="flex flex-col items-center gap-3">
                                    <div class="w-12 h-12 bg-indigo-50 rounded-2xl flex items-center justify-center text-indigo-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.826a4 4 0 015.656 0l4 4a4 4 0 01-5.656 5.656l-1.1-1.1" /></svg>
                                    </div>
                                    <p class="text-slate-400 font-bold text-xs uppercase tracking-wider">Không tìm thấy liên kết nào phù hợp.</p>
                                    @if(request('search'))
                                        <a href="{{ route('links.index') }}" class="text-indigo-600 font-bold text-xs uppercase tracking-wider hover:underline underline-offset-4">Xóa tìm kiếm</a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="px-5 sm:px-6 py-4 bg-slate-50/50 border-t border-slate-100">
                {{ $links->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    </div>
</div>
@endsection
