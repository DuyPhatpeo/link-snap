<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Truy cập bị từ chối | LinkSnap</title>
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

<body class="bg-slate-50 min-h-screen flex items-center justify-center p-4 sm:p-6 relative overflow-hidden selection:bg-rose-500 selection:text-white">
    {{-- Decorative Background Shapes --}}
    <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-rose-100/50 rounded-full blur-[120px]"></div>
    <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] bg-orange-100/50 rounded-full blur-[120px]"></div>
    <div class="absolute inset-0 bg-grid opacity-50"></div>

    <div class="max-w-lg w-full glass-card rounded-2xl p-8 sm:p-12 shadow-xl border border-slate-200/80 relative z-10 text-center animate-in fade-in zoom-in-95 duration-500">
        {{-- Status Code Badge --}}
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 bg-rose-500 text-white rounded-md font-bold text-xs uppercase tracking-wider mb-6 shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
            </svg>
            Truy cập bị từ chối
        </div>

        {{-- Big Title --}}
        <div class="relative mb-6">
            <h1 class="text-8xl sm:text-9xl font-black text-slate-100 select-none tracking-tighter opacity-70 absolute left-1/2 -translate-x-1/2 -top-8 font-heading">403</h1>
            <h2 class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight relative z-10 pt-4 font-heading">
                Dừng lại! <br> <span class="text-rose-500">Khu vực hạn chế.</span>
            </h2>
        </div>

        <p class="text-slate-500 font-medium text-sm sm:text-base leading-relaxed mb-8 max-w-sm mx-auto">
            Bạn không có đủ quyền hạn để truy cập vào tài nguyên này. Vui lòng quay lại hoặc đăng nhập bằng tài khoản khác.
        </p>

        {{-- Action Buttons --}}
        <div class="flex flex-col gap-3">
            <a href="/" class="w-full inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl font-bold text-sm text-white bg-slate-900 hover:bg-black shadow-md active:scale-[0.99] transition-all">
                <span>Quay lại trang chủ</span>
            </a>
            <button onclick="window.history.back()" class="w-full py-2.5 text-xs font-bold text-slate-500 hover:text-slate-800 transition-colors">
                Trở về trang trước đó
            </button>
        </div>

        {{-- Footer --}}
        <div class="mt-8 pt-6 border-t border-slate-100 flex items-center justify-center gap-2 text-slate-400 font-bold text-[10px] uppercase tracking-wider">
            <span>LinkSnap Security</span>
            <span class="w-1 h-1 bg-slate-300 rounded-full"></span>
            <span>Ghi nhận nhật ký bảo mật</span>
        </div>
    </div>
</body>

</html>