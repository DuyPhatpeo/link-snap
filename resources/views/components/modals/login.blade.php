<!-- Modal Đăng nhập -->
<div id="loginModal" onclick="if(event.target===this) Modal.close('loginModal')" class="fixed inset-0 bg-slate-950/60 backdrop-blur-md z-50 flex items-center justify-center p-4 hidden animate-in fade-in duration-300">
    <div class="bg-white/95 backdrop-blur-2xl rounded-[36px] p-7 sm:p-10 w-full max-w-md shadow-2xl border border-white/90 relative">
        <div class="flex flex-col items-center mb-7">
            {{-- Logo Mark --}}
            <div class="w-14 h-14 rounded-2xl bg-gradient-to-tr from-indigo-600 via-violet-600 to-cyan-400 p-[1.5px] shadow-lg shadow-indigo-500/25 mb-4">
                <div class="w-full h-full bg-white rounded-[14px] flex items-center justify-center p-2">
                    <img src="{{ asset('logo.png') }}" alt="Logo" class="w-full h-full object-contain">
                </div>
            </div>
            <h2 class="text-2xl sm:text-3xl font-black font-outfit text-slate-900 tracking-tight">Chào mừng trở lại</h2>
            <p class="text-slate-400 font-medium text-xs mt-1">Đăng nhập để tiếp tục quản lý các liên kết của bạn.</p>
        </div>

        <form onsubmit="Auth.handleLogin(event)" class="space-y-4">
            @csrf
            <div>
                <label class="text-[10px] font-black font-outfit text-slate-400 uppercase tracking-widest block mb-1.5 ml-1">Địa chỉ Email</label>
                <input type="email" name="email" required placeholder="name@example.com"
                    class="w-full bg-slate-50/80 border border-slate-200 rounded-2xl py-3 px-4 outline-none focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-50 transition-all text-xs font-semibold text-slate-800">
            </div>

            <div class="relative">
                <div class="flex items-center justify-between mb-1.5 ml-1">
                    <label class="text-[10px] font-black font-outfit text-slate-400 uppercase tracking-widest">Mật khẩu</label>
                </div>
                <div class="relative">
                    <input type="password" id="loginPwd" name="password" required placeholder="••••••••"
                        class="w-full bg-slate-50/80 border border-slate-200 rounded-2xl py-3 pl-4 pr-12 outline-none focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-50 transition-all text-xs font-semibold text-slate-800">
                    <button type="button" onclick="const p=document.getElementById('loginPwd'); p.type=p.type==='password'?'text':'password'; this.classList.toggle('text-indigo-600')" class="absolute right-3.5 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 p-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                    </button>
                </div>
            </div>

            <button type="submit" class="w-full bg-gradient-to-r from-indigo-600 to-violet-600 hover:from-indigo-700 hover:to-violet-700 text-white font-bold font-outfit py-3.5 rounded-2xl transition-all shadow-lg shadow-indigo-500/25 uppercase tracking-wider text-xs active:scale-95 mt-2">
                Đăng nhập
            </button>
            
            <div class="relative flex items-center py-2">
                <div class="flex-grow border-t border-slate-100"></div>
                <span class="flex-shrink-0 mx-3 text-slate-300 text-[9px] font-black uppercase tracking-widest">Hoặc</span>
                <div class="flex-grow border-t border-slate-100"></div>
            </div>

            <button type="button" onclick="Auth.googleLogin()" class="w-full bg-white hover:bg-slate-50 text-slate-700 border border-slate-200 font-bold font-outfit py-3 rounded-2xl transition-all flex items-center justify-center gap-2.5 shadow-sm active:scale-95 text-xs">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="w-4 h-4"><path fill="#fbc02d" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12 s5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24s8.955,20,20,20 s20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"/><path fill="#e53935" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039 l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"/><path fill="#4caf50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36 c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"/><path fill="#1565c0" d="M43.611,20.083L43.595,20L42,20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571 c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"/></svg>
                <span>Tiếp tục với Google</span>
            </button>

            <p class="text-center text-xs text-slate-500 font-medium pt-2">
                Chưa có tài khoản? 
                <button type="button" onclick="Modal.switch('loginModal', 'registerModal')" class="text-indigo-600 font-bold hover:underline">Đăng ký ngay</button>
            </p>
        </form>

        <button onclick="Modal.close('loginModal')" class="mt-4 w-full text-center text-[10px] font-bold text-slate-400 hover:text-slate-600 uppercase tracking-widest transition-colors">
            Đóng
        </button>
    </div>
</div>
