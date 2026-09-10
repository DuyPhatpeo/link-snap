<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>419 - Phiên làm việc hết hạn | LinkSnap</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Be Vietnam Pro"', 'sans-serif'],
                        heading: ['"Be Vietnam Pro"', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Be Vietnam Pro', sans-serif; }
        .glass-card {
            background: rgba(255, 255, 255, 0.88);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
        }
        .bg-grid {
            background-image: radial-gradient(#f1f5f9 1px, transparent 1px);
            background-size: 30px 30px;
        }
    </style>
</head>

<body class="bg-slate-50 min-h-screen flex items-center justify-center p-4 sm:p-6 relative overflow-hidden selection:bg-indigo-600 selection:text-white">
    {{-- Decorative Background Shapes --}}
    <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-indigo-100/50 rounded-full blur-[120px]"></div>
    <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] bg-amber-100/50 rounded-full blur-[120px]"></div>
    <div class="absolute inset-0 bg-grid opacity-50"></div>

    <div class="max-w-lg w-full glass-card rounded-2xl p-8 sm:p-12 shadow-xl border border-slate-200/80 relative z-10 text-center animate-in fade-in zoom-in-95 duration-500">
        {{-- Status Code Badge --}}
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 bg-amber-50 text-amber-600 rounded-md font-bold text-xs uppercase tracking-wider mb-6 border border-amber-100 shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Phiên đã hết hạn
        </div>

        {{-- Big Title --}}
        <div class="relative mb-6">
            <h1 class="text-8xl sm:text-9xl font-black text-slate-100 select-none tracking-tighter opacity-70 absolute left-1/2 -translate-x-1/2 -top-8 font-heading">419</h1>
            <h2 class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight relative z-10 pt-4 font-heading">
                Thời gian <br> <span class="text-amber-600">đã tạm dừng.</span>
            </h2>
        </div>

        <p class="text-slate-500 font-medium text-sm sm:text-base leading-relaxed mb-8 max-w-sm mx-auto">
            Phiên làm việc bảo mật đã hết hạn do trang không hoạt động trong một khoảng thời gian. Vui lòng tải lại trang để tiếp tục.
        </p>

        {{-- Action Buttons --}}
        <div class="flex flex-col gap-3">
            <button onclick="window.location.reload()" class="w-full inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl font-bold text-sm text-white bg-indigo-600 hover:bg-indigo-700 shadow-sm active:scale-[0.99] transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                </svg>
                <span>Tải lại trang ngay</span>
            </button>
            <a href="/" class="w-full py-2.5 text-xs font-bold text-slate-500 hover:text-indigo-600 transition-colors">
                Quay lại trang chủ
            </a>
        </div>

        {{-- Footer --}}
        <div class="mt-8 pt-6 border-t border-slate-100 flex items-center justify-center gap-2 text-slate-400 font-bold text-[10px] uppercase tracking-wider">
            <span>Mã lỗi: 419_CSRF_TIMEOUT</span>
            <span class="w-1 h-1 bg-slate-300 rounded-full"></span>
            <span>Bảo mật phiên làm việc</span>
        </div>
    </div>
</body>

</html>