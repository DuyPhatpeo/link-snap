<!DOCTYPE html>
<html lang="vi" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'LinkSnap - Nền tảng Rút gọn Link & Bio Profile Hiện Đại')</title>
    
    <!-- Dynamic Social Preview (OG Tags) -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('og_title', 'LinkSnap - Modern URL Shortener & Bio Page')">
    <meta property="og:description" content="@yield('og_description', 'Rút gọn liên kết siêu tốc, bảo mật nâng cao và trang Bio đa liên kết chuyên nghiệp.')">
    <meta property="og:image" content="@yield('og_image', asset('logo.png'))">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('og_title', 'LinkSnap - URL Shortener')">
    <meta name="twitter:description" content="@yield('og_description', 'Rút gọn liên kết siêu tốc, bảo mật nâng cao và trang Bio đa liên kết chuyên nghiệp.')">
    <meta name="twitter:image" content="@yield('og_image', asset('logo.png'))">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">

    <!-- Google Fonts: Be Vietnam Pro, JetBrains Mono -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,600;1,700&family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS CDN & Chart.js -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>

    <!-- Custom CSS Design System -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { 
                        sans: ['"Be Vietnam Pro"', 'sans-serif'],
                        outfit: ['"Be Vietnam Pro"', 'sans-serif'],
                        vietnam: ['"Be Vietnam Pro"', 'sans-serif'],
                        heading: ['"Be Vietnam Pro"', 'sans-serif'],
                        mono: ['"JetBrains Mono"', 'monospace']
                    },
                    colors: { 
                        'brand-blue': '#4f46e5', 
                        'brand-indigo': '#6366f1',
                        'brand-violet': '#8b5cf6',
                        'brand-cyan': '#06b6d4',
                        'brand-pink': '#ec4899',
                        'brand-emerald': '#10b981',
                        'dark-canvas': '#080a10',
                    },
                    borderRadius: {
                        '3xl': '1.5rem',
                        '4xl': '2rem',
                        '5xl': '2.5rem',
                    },
                    boxShadow: {
                        'aurora': '0 20px 50px -10px rgba(99, 102, 241, 0.25)',
                        'aurora-cyan': '0 20px 50px -10px rgba(6, 182, 212, 0.25)',
                        'glass': '0 8px 32px 0 rgba(31, 38, 135, 0.07)',
                        'hyper': '0 0 50px -10px rgba(99, 102, 241, 0.35)',
                    }
                }
            }
        }
    </script>
    @stack('styles')
</head>
<body class="font-sans min-h-screen text-slate-800 bg-[#fbfbfe] selection:bg-indigo-100 selection:text-indigo-600 antialiased relative overflow-x-hidden" data-auth="{{ Auth::check() ? '1' : '0' }}">

    {{-- Ambient Aurora Canvas Blobs (Mượt mà, sống động) --}}
    <div class="fixed inset-0 pointer-events-none overflow-hidden -z-10 select-none">
        <div class="absolute -top-[15%] -left-[10%] w-[55vw] h-[55vw] max-w-[700px] max-h-[700px] bg-gradient-to-br from-indigo-200/40 via-purple-200/30 to-cyan-100/40 rounded-full blur-[130px] animate-pulse" style="animation-duration: 9s;"></div>
        <div class="absolute top-[25%] -right-[15%] w-[50vw] h-[50vw] max-w-[650px] max-h-[650px] bg-gradient-to-bl from-cyan-200/35 via-blue-100/30 to-rose-100/25 rounded-full blur-[140px] animate-pulse" style="animation-duration: 12s; animation-delay: 2s;"></div>
        <div class="absolute bottom-[-10%] left-[20%] w-[60vw] h-[40vw] max-w-[800px] bg-gradient-to-tr from-violet-100/40 to-sky-100/40 rounded-full blur-[150px]"></div>
    </div>

    <!-- Floating Pill Navigation (Thanh điều hướng nổi) -->
    <header class="sticky top-2.5 z-50 max-w-6xl mx-auto px-3 sm:px-6 transition-all duration-300">
        <nav class="glass-pill rounded-full px-4 sm:px-5 py-2 flex items-center justify-between transition-all duration-300">
            
            {{-- Brand Logo --}}
            <div class="flex items-center gap-3 select-none cursor-pointer group active:scale-95 transition-all" onclick="window.location.assign('/')">
                <div class="w-10 h-10 rounded-2xl bg-gradient-to-tr from-indigo-600 via-violet-600 to-cyan-400 p-[2px] shadow-lg shadow-indigo-500/20 group-hover:shadow-indigo-500/35 transition-all duration-300">
                    <div class="w-full h-full bg-white rounded-[14px] flex items-center justify-center p-1.5">
                        <img src="{{ asset('logo.png') }}" alt="LinkSnap" class="w-full h-full object-contain rounded-lg">
                    </div>
                </div>
                <span class="text-xl sm:text-2xl font-black font-outfit tracking-tight text-slate-900 group-hover:opacity-95">
                    Link<span class="text-gradient-aurora">Snap</span>
                </span>
            </div>

            {{-- Center Navigation Links (Desktop) --}}
            @auth
            <div class="hidden md:flex items-center gap-1 bg-slate-100/70 p-1 rounded-full border border-slate-200/50">
                <a href="/" class="px-5 py-2 rounded-full text-xs font-bold tracking-wide transition-all {{ Request::is('/') ? 'bg-white text-indigo-600 shadow-sm' : 'text-slate-500 hover:text-slate-900' }}">
                    Liên kết của tôi
                </a>
                <a href="/bio" class="px-5 py-2 rounded-full text-xs font-bold tracking-wide transition-all {{ Request::is('bio*') ? 'bg-white text-indigo-600 shadow-sm' : 'text-slate-500 hover:text-slate-900' }}">
                    Trang Bio
                </a>
            </div>
            @endauth

            {{-- Right Controls --}}
            <div class="flex items-center gap-2 sm:gap-3">
                <!-- Nút Shortcut Rút Gọn Nhanh (Ctrl + K) -->
                <button onclick="window.globalActionShortcut && window.globalActionShortcut()" 
                        class="hidden sm:flex items-center gap-2 px-3.5 py-2 bg-slate-50 hover:bg-white border border-slate-200/80 rounded-full text-slate-400 hover:text-indigo-600 hover:border-indigo-200 transition-all shadow-sm group active:scale-95" 
                        title="Rút gọn link nhanh">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-400 group-hover:text-indigo-600 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span class="text-[11px] font-bold text-slate-500 group-hover:text-slate-800 transition-colors">Snap</span>
                    <div class="flex items-center gap-0.5">
                        <kbd class="text-[9px] font-bold font-mono text-slate-400 bg-white border border-slate-200 px-1 py-0.5 rounded shadow-sm">⌘K</kbd>
                    </div>
                </button>

                @auth
                    {{-- User Profile Pill --}}
                    <div class="hidden md:flex items-center gap-3 pl-2 border-l border-slate-200">
                        <div class="flex items-center gap-2.5 bg-slate-50 border border-slate-200/80 pl-2.5 pr-3 py-1.5 rounded-full">
                            <div class="w-6 h-6 rounded-full bg-gradient-to-tr from-indigo-600 to-violet-500 text-white font-black text-[10px] flex items-center justify-center">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <span class="text-xs font-bold text-slate-700 max-w-[120px] truncate">{{ Auth::user()->name }}</span>
                        </div>
                        <form action="/api/logout" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="p-2 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-full transition-all" title="Đăng xuất">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                            </button>
                        </form>
                    </div>

                    {{-- Mobile Hamburger --}}
                    <button onclick="Navbar.openMobileMenu()" class="flex md:hidden p-2 text-slate-600 hover:text-indigo-600 hover:bg-indigo-50/50 rounded-full transition-all" aria-label="Mở menu">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                @else
                    {{-- Guest Buttons --}}
                    <div class="flex items-center gap-2">
                        <button onclick="Modal.open('loginModal')" class="text-xs font-bold text-slate-600 hover:text-slate-900 px-3 sm:px-4 py-2 rounded-full hover:bg-slate-100 transition-all">
                            Đăng nhập
                        </button>
                        <button onclick="Modal.open('registerModal')" class="text-xs font-bold bg-gradient-to-r from-indigo-600 to-violet-600 hover:from-indigo-700 hover:to-violet-700 text-white px-4 sm:px-5 py-2 rounded-full shadow-md shadow-indigo-500/20 hover:shadow-indigo-500/30 transition-all active:scale-95">
                            Bắt đầu ngay
                        </button>
                    </div>
                @endauth
            </div>
        </nav>
    </header>

    <!-- Main Content Canvas -->
    <main class="relative z-10 transition-all duration-300">
        @yield('content')
    </main>

    <!-- Bespoke Modern Footer -->
    <footer class="mt-10 border-t border-slate-200/60 bg-white/50 backdrop-blur-lg pt-10 pb-8 relative overflow-hidden">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                {{-- Col 1: Brand & Tagline --}}
                <div class="md:col-span-2 space-y-3">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-xl bg-gradient-to-tr from-indigo-600 to-cyan-400 p-[1.5px]">
                            <div class="w-full h-full bg-white rounded-[10px] flex items-center justify-center p-1">
                                <img src="{{ asset('logo.png') }}" alt="Logo" class="w-full h-full object-contain">
                            </div>
                        </div>
                        <span class="text-xl font-black font-outfit text-slate-900">Link<span class="text-gradient-aurora">Snap</span></span>
                    </div>
                    <p class="text-slate-500 text-xs sm:text-sm font-medium leading-relaxed max-w-sm">
                        Nền tảng rút gọn liên kết thông minh, bảo mật mã hóa và xây dựng trang Bio Profile đỉnh cao cho người sáng tạo nội dung hiện đại.
                    </p>
                    <div class="flex items-center gap-2 pt-1">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                        <span class="text-[11px] font-bold text-slate-500">Hệ thống hoạt động 99.99%</span>
                    </div>
                </div>

                {{-- Col 2: Sản phẩm --}}
                <div class="space-y-2">
                    <h4 class="text-xs font-black font-outfit text-slate-900 uppercase tracking-widest">Sản phẩm</h4>
                    <ul class="space-y-2 text-xs font-semibold text-slate-500">
                        <li><a href="/" class="hover:text-indigo-600 transition-colors">Rút gọn liên kết</a></li>
                        <li><a href="{{ route('bio.index') }}" class="hover:text-indigo-600 transition-colors">Tạo trang Bio</a></li>
                        <li><a href="#" class="hover:text-indigo-600 transition-colors opacity-60 cursor-not-allowed">Phân tích chuyên sâu</a></li>
                    </ul>
                </div>

                {{-- Col 3: Điều hướng --}}
                <div class="space-y-2">
                    <h4 class="text-xs font-black font-outfit text-slate-900 uppercase tracking-widest">Tài khoản</h4>
                    <ul class="space-y-2 text-xs font-semibold text-slate-500">
                        @auth
                            <li><a href="/" class="hover:text-indigo-600 transition-colors">Bảng điều khiển</a></li>
                            <li><a href="{{ route('bio.index') }}" class="hover:text-indigo-600 transition-colors">Quản lý Bio Pages</a></li>
                        @else
                            <li><button onclick="Modal.open('loginModal')" class="hover:text-indigo-600 transition-colors text-left">Đăng nhập</button></li>
                            <li><button onclick="Modal.open('registerModal')" class="hover:text-indigo-600 transition-colors text-left">Đăng ký tài khoản</button></li>
                        @endauth
                    </ul>
                </div>
            </div>

            {{-- Bottom Divider & Copyright --}}
            <div class="pt-5 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs font-medium text-slate-400">
                <p>&copy; {{ date('Y') }} LinkSnap. Thiết kế độc bản & tối ưu hóa trải nghiệm.</p>
                <div class="flex items-center gap-6">
                    <a href="#" class="hover:text-slate-600 transition-colors">Chính sách bảo mật</a>
                    <a href="#" class="hover:text-slate-600 transition-colors">Điều khoản dịch vụ</a>
                </div>
            </div>
        </div>
    </footer>

    @auth
    {{-- Mobile Menu Drawer --}}
    <div id="mobileMenu" class="fixed inset-0 z-[100] invisible pointer-events-none transition-all duration-300">
        <div id="mobileMenuBackdrop" onclick="Navbar.closeMobileMenu()" class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm opacity-0 transition-opacity duration-300"></div>
        <div id="mobileMenuDrawer" class="absolute top-0 right-0 h-full w-80 bg-white/95 backdrop-blur-2xl shadow-2xl translate-x-full transition-transform duration-300 ease-out flex flex-col">
            <div class="flex items-center justify-between p-6 border-b border-slate-100">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('logo.png') }}" alt="Logo" class="w-8 h-8 rounded-xl object-contain">
                    <span class="text-lg font-black font-outfit text-slate-900">LinkSnap Menu</span>
                </div>
                <button onclick="Navbar.closeMobileMenu()" class="p-2 text-slate-400 hover:text-rose-500 bg-slate-50 rounded-xl transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" /></svg>
                </button>
            </div>

            <div class="p-6 bg-slate-50/70 border-b border-slate-100 flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-indigo-600 to-violet-600 flex items-center justify-center text-white font-black text-sm shadow-md">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div class="overflow-hidden">
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest leading-none mb-1">Tài khoản</p>
                    <p class="text-slate-800 font-bold text-sm truncate">{{ Auth::user()->name }}</p>
                </div>
            </div>

            <div class="flex-1 p-6 space-y-3">
                <a href="/" class="flex items-center justify-between px-4 py-3.5 rounded-2xl {{ Request::is('/') ? 'bg-indigo-600 text-white shadow-md shadow-indigo-500/20' : 'bg-slate-50 text-slate-700 hover:bg-slate-100' }} transition-all">
                    <span class="font-bold text-xs uppercase tracking-wider">Liên kết của tôi</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" /></svg>
                </a>
                <a href="/bio" class="flex items-center justify-between px-4 py-3.5 rounded-2xl {{ Request::is('bio*') ? 'bg-indigo-600 text-white shadow-md shadow-indigo-500/20' : 'bg-slate-50 text-slate-700 hover:bg-slate-100' }} transition-all">
                    <span class="font-bold text-xs uppercase tracking-wider">Trang Bio</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" /></svg>
                </a>
            </div>

            <div class="p-6 border-t border-slate-100">
                <form action="/api/logout" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center gap-2 px-5 py-3.5 bg-rose-50 text-rose-600 rounded-2xl font-bold text-xs uppercase tracking-widest hover:bg-rose-500 hover:text-white transition-all">
                        Đăng xuất tài khoản
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endauth

    <!-- Modals -->
    @include('partials.modals')

    <!-- Core Application JavaScript -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @stack('scripts')

    {{-- Flash Data for JS Toast Notifications --}}
    <div id="flash-data" 
         data-error="{{ session('error') }}" 
         data-success="{{ session('success') }}" 
         class="hidden"></div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const flashData = document.getElementById('flash-data');
            const error = flashData?.getAttribute('data-error');
            const success = flashData?.getAttribute('data-success');

            if (error && window.Toast) Toast.show(error, 'error');
            if (success && window.Toast) Toast.show(success, 'success');

            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('login') && window.Modal) Modal.open('loginModal');
            if (urlParams.has('register') && window.Modal) Modal.open('registerModal');
        });
    </script>
</body>
</html>
