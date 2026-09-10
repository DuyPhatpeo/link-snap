<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Không tìm thấy trang | LinkSnap</title>
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
            background-image: radial-gradient(#e2e8f0 1px, transparent 1px);
            background-size: 30px 30px;
        }
    </style>
</head>

<body class="bg-slate-50 min-h-screen flex items-center justify-center p-4 sm:p-6 relative overflow-hidden selection:bg-indigo-600 selection:text-white">
    {{-- Decorative Background Shapes --}}
    <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-indigo-100/50 rounded-full blur-[120px]"></div>
    <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] bg-violet-100/50 rounded-full blur-[120px]"></div>
    <div class="absolute inset-0 bg-grid opacity-50"></div>

    <div class="max-w-lg w-full glass-card rounded-2xl p-8 sm:p-12 shadow-xl border border-slate-200/80 relative z-10 text-center animate-in fade-in zoom-in-95 duration-500">
        {{-- Status Code Badge --}}
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 bg-rose-50 text-rose-600 rounded-md font-bold text-xs uppercase tracking-wider mb-6 border border-rose-100 shadow-sm">
            <span class="w-2 h-2 bg-rose-500 rounded-sm animate-pulse"></span>
            Mã lỗi: 404
        </div>

        {{-- Big Title --}}
        <div class="relative mb-6">
            <h1 class="text-8xl sm:text-9xl font-black text-slate-100 select-none tracking-tighter opacity-70 absolute left-1/2 -translate-x-1/2 -top-8 font-heading">404</h1>
            <h2 class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight relative z-10 pt-4 font-heading">
                Trang này <br> <span class="text-indigo-600">không tồn tại!</span>
            </h2>
        </div>

        <p class="text-slate-500 font-medium text-sm sm:text-base leading-relaxed mb-8 max-w-sm mx-auto">
            Liên kết bạn truy cập có thể đã hết hạn, bị đổi tên hoặc không còn tồn tại trên hệ thống của chúng tôi.
        </p>

        {{-- Action Buttons --}}
        <div class="flex flex-col gap-3">
            <a href="/" class="w-full inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl font-bold text-sm text-white bg-indigo-600 hover:bg-indigo-700 shadow-sm active:scale-[0.99] transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span>Quay lại trang chủ</span>
            </a>
            <button onclick="window.history.back()" class="w-full py-2.5 text-xs font-bold text-slate-500 hover:text-indigo-600 transition-colors">
                Trở về trang trước đó
            </button>
        </div>

        {{-- Footer --}}
        <div class="mt-8 pt-6 border-t border-slate-100 flex items-center justify-center gap-2 text-slate-400 font-bold text-[10px] uppercase tracking-wider">
            <span>LinkSnap</span>
            <span class="w-1 h-1 bg-slate-300 rounded-full"></span>
            <span>Hệ thống hoạt động bình thường</span>
        </div>
    </div>
</body>

</html>