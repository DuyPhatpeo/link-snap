/**
 * LinkSnap - Main Client Application Script
 * Modularized for performance, browser caching, and maintainability.
 */

/**
 * Cấu hình toàn cục
 */
const IS_AUTHENTICATED = document.body.dataset.auth === '1';

/**
 * Công cụ gọi API (AJAX Helper)
 * Tự động đính kèm CSRF Token từ meta tag hoặc form input.
 */
const Api = {
    async fetch(url, options = {}) {
        const cleanUrl = url.startsWith('/') ? url : `/${url}`;
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') 
                       || document.querySelector('input[name="_token"]')?.value 
                       || '';

        const config = {
            ...options,
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                ...(options.headers || {})
            }
        };
        if (options.body && typeof options.body === 'object') {
            config.body = JSON.stringify(options.body);
        }

        try {
            const res = await fetch(cleanUrl, config);
            const data = await res.json();
            if (!res.ok) throw {
                status: res.status,
                data
            };
            return data;
        } catch (err) {
            console.error(`[Api Error] ${cleanUrl}:`, err);
            throw err;
        }
    }
};

/**
 * Tiện ích chung
 */
const Utils = {
    async copyToClipboard(text, btn = null) {
        try {
            await navigator.clipboard.writeText(text);
            if (btn) {
                const originalContent = btn.innerHTML;
                if (originalContent.includes('<svg')) {
                    btn.classList.add('!bg-emerald-600', '!text-white', '!border-emerald-600');
                    setTimeout(() => {
                        btn.classList.remove('!bg-emerald-600', '!text-white', '!border-emerald-600');
                    }, 2000);
                } else {
                    btn.innerHTML = 'COPIED! ✨';
                    setTimeout(() => {
                        btn.innerHTML = originalContent;
                    }, 2000);
                }
            }
            Toast.show('Đã sao chép vào bộ nhớ tạm!', 'success');
            return true;
        } catch (err) {
            console.error('Copy failed', err);
            Toast.show('Không thể sao chép. Vui lòng thử lại.', 'error');
            return false;
        }
    },
    debounce(func, wait) {
        let timeout;
        return function(...args) {
            clearTimeout(timeout);
            timeout = setTimeout(() => func.apply(this, args), wait);
        };
    }
};

/**
 * Bộ điều khiển Modal (Ẩn/Hiện)
 */
const Modal = {
    init() {
        // Đóng khi nhấn nền (Backdrop)
        window.addEventListener('click', (e) => {
            if (e.target.classList.contains('fixed') && e.target.id.endsWith('Modal')) {
                this.close(e.target.id);
            }
        });

        // Đóng khi nhấn phím ESC
        window.addEventListener('keydown', (e) => {
            const isEscape = e.key === 'Escape' || e.key === 'Esc' || e.keyCode === 27;
            if (isEscape) {
                document.querySelectorAll('[id$="Modal"]:not(.hidden)').forEach(modal => {
                    this.close(modal.id);
                });
            }
        });
    },
    open(id) {
        const el = document.getElementById(id);
        if (el) {
            el.classList.remove('hidden');
            el.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }
    },
    close(id) {
        const el = document.getElementById(id);
        if (el) {
            el.classList.add('hidden');
            el.classList.remove('flex');
            document.body.style.overflow = '';
        }
    },
    switch(oldId, newId) {
        this.close(oldId);
        this.open(newId);
    }
};

/**
 * Navbar Management
 */
const Navbar = {
    openMobileMenu() {
        const menu = document.getElementById('mobileMenu');
        const backdrop = document.getElementById('mobileMenuBackdrop');
        const drawer = document.getElementById('mobileMenuDrawer');
        
        if (!menu || !backdrop || !drawer) return;

        menu.classList.remove('invisible', 'pointer-events-none');
        setTimeout(() => {
            backdrop.classList.add('opacity-100');
            drawer.classList.remove('translate-x-full');
        }, 10);
        
        document.body.style.overflow = 'hidden';
    },
    closeMobileMenu() {
        const menu = document.getElementById('mobileMenu');
        const backdrop = document.getElementById('mobileMenuBackdrop');
        const drawer = document.getElementById('mobileMenuDrawer');
        
        if (!menu || !backdrop || !drawer) return;

        backdrop.classList.remove('opacity-100');
        drawer.classList.add('translate-x-full');
        
        setTimeout(() => {
            menu.classList.add('invisible', 'pointer-events-none');
            document.body.style.overflow = '';
        }, 300);
    }
};

Modal.init();

/**
 * Hiển thị lỗi ngay trên ô nhập liệu
 */
const ErrorUI = {
    show(inputEl, msg) {
        if (!inputEl) return;
        
        if (inputEl.id === 'url' || inputEl.id === 'customCode') {
            AlertUI.show(msg);
            inputEl.classList.add('!border-rose-400', '!bg-rose-50/50');
            return;
        }

        let container = inputEl.closest('.group') || inputEl.parentElement;
        let errorEl = container.querySelector('.input-error');
        if (!errorEl) {
            container.style.position = 'relative';
            errorEl = document.createElement('div');
            errorEl.className = 'input-error absolute top-0 right-4 text-rose-500 text-[10px] md:text-[11px] font-black uppercase tracking-wider animate-in fade-in slide-in-from-right-1 z-30 opacity-90';
            inputEl.parentElement.insertBefore(errorEl, inputEl);
        }
        errorEl.innerHTML = `${msg}`;
        inputEl.classList.add('!border-rose-400', '!bg-rose-50/50');
    },
    clear(formEl) {
        if (!formEl) return;
        formEl.querySelectorAll('.input-error').forEach(e => e.remove());
        formEl.querySelectorAll('input').forEach(input => {
            input.classList.remove('!border-rose-400', '!bg-rose-50/50');
        });
        AlertUI.clear();
    }
};

/**
 * Bộ hiển thị thông báo dạng Alert cho Form rút gọn chính
 */
const AlertUI = {
    show(message) {
        this.clear();
        
        const inputUrl = document.getElementById('url');
        if (!inputUrl) return;
        const container = inputUrl.closest('section') || inputUrl.parentElement;
        if (!container) return;

        container.classList.add('relative');

        const alert = document.createElement('div');
        alert.id = 'formAlert';
        alert.className = 'absolute -top-16 left-0 right-0 bg-rose-50 border border-rose-200 text-rose-800 rounded-2xl px-5 py-3 flex items-center justify-between shadow-xl animate-in fade-in slide-in-from-top-2 duration-300 z-[9999]';
        alert.innerHTML = `
            <div class="flex items-center gap-2.5">
                <span class="w-2 h-2 bg-rose-500 rounded-full animate-ping shrink-0"></span>
                <span class="text-xs font-bold font-outfit uppercase tracking-wider">${message}</span>
            </div>
            <button onclick="AlertUI.clear()" class="text-rose-400 hover:text-rose-700 p-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        `;
        
        container.appendChild(alert);
        this.timeout = setTimeout(() => this.clear(), 8000);
    },
    clear() {
        if (this.timeout) clearTimeout(this.timeout);
        const el = document.getElementById('formAlert');
        if (el) {
            el.classList.add('fade-out');
            setTimeout(() => el.remove(), 200);
        }
    }
};

/**
 * Toast Notification System
 */
const Toast = {
    show(message, type = 'info') {
        if (this.currentToast) this.currentToast.remove();

        const toast = document.createElement('div');
        toast.className = `fixed bottom-6 right-6 px-5 py-3.5 rounded-2xl shadow-2xl z-[100] transform transition-all duration-300 translate-y-6 opacity-0 flex items-center gap-3 font-bold text-xs tracking-wide backdrop-blur-xl border`;

        const icons = {
            success: `<svg class="w-4 h-4 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>`,
            error: `<svg class="w-4 h-4 text-rose-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>`,
            info: `<svg class="w-4 h-4 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>`
        };

        const styles = {
            success: 'bg-slate-900/90 border-emerald-500/40 text-emerald-300',
            error: 'bg-slate-900/90 border-rose-500/40 text-rose-300',
            info: 'bg-slate-900/90 border-indigo-500/40 text-indigo-200'
        };

        toast.classList.add(...styles[type].split(' '));
        toast.innerHTML = `${icons[type]} <span>${message}</span>`;
        document.body.appendChild(toast);
        this.currentToast = toast;

        requestAnimationFrame(() => {
            toast.classList.remove('translate-y-6', 'opacity-0');
        });

        setTimeout(() => {
            toast.classList.add('translate-y-6', 'opacity-0');
            setTimeout(() => toast.remove(), 300);
        }, 3500);
    }
};

/**
 * Custom Confirm Modal
 */
const Confirm = {
    show(message, onConfirm, options = {}) {
        const modal = document.createElement('div');
        modal.className = 'fixed inset-0 z-[200] flex items-center justify-center p-4 animate-in fade-in duration-200';
        modal.innerHTML = `
            <div class="absolute inset-0 bg-slate-950/60 backdrop-blur-md"></div>
            <div class="bg-white rounded-[32px] p-7 sm:p-9 w-full max-w-sm shadow-2xl relative border border-white/90 animate-in zoom-in-95 duration-200 text-center">
                <div class="w-14 h-14 bg-rose-50 rounded-2xl flex items-center justify-center text-rose-500 mx-auto mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </div>
                <h3 class="text-lg font-black font-outfit text-slate-900 mb-1.5">${options.title || 'Xác nhận xóa?'}</h3>
                <p class="text-slate-500 font-medium text-xs mb-6 leading-relaxed">${message}</p>
                <div class="flex flex-col gap-2.5">
                    <button id="confirmBtn" class="w-full bg-rose-600 hover:bg-rose-700 text-white font-bold font-outfit py-3 rounded-xl shadow-lg shadow-rose-500/20 transition-all active:scale-95 text-xs uppercase tracking-wider">
                        ${options.confirmText || 'Xác nhận xóa'}
                    </button>
                    <button id="cancelBtn" class="w-full bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold font-outfit py-3 rounded-xl transition-all text-xs">
                        ${options.cancelText || 'Hủy bỏ'}
                    </button>
                </div>
            </div>
        `;
        document.body.appendChild(modal);
        document.body.style.overflow = 'hidden';

        const close = () => {
            modal.remove();
            document.body.style.overflow = '';
        };

        modal.querySelector('#confirmBtn').onclick = () => {
            onConfirm();
            close();
        };
        modal.querySelector('#cancelBtn').onclick = close;
        modal.onclick = (e) => { if (e.target === modal.querySelector('.absolute')) close(); };
    }
};

/**
 * Logic xử lý Xác thực (Login / Register / OAuth)
 */
const Auth = {
    async handleLogin(e) {
        e.preventDefault();
        const form = e.target;
        ErrorUI.clear(form);

        const formData = new FormData(form);
        const email = formData.get('email');
        const password = formData.get('password');
        let error = false;

        if (!email) {
            ErrorUI.show(form.querySelector('[name=email]'), 'Vui lòng nhập email');
            error = true;
        }
        if (!password) {
            ErrorUI.show(form.querySelector('[name=password]'), 'Vui lòng nhập mật khẩu');
            error = true;
        }
        if (error) return;

        try {
            await Api.fetch('api/login', {
                method: 'POST',
                body: Object.fromEntries(formData)
            });
            window.location.assign('/');
        } catch (err) {
            ErrorUI.show(form.querySelector('[name=password]'), err.data?.message || 'Thông tin đăng nhập không hợp lệ.');
        }
    },
    async handleRegister(e) {
        e.preventDefault();
        const form = e.target;
        ErrorUI.clear(form);

        const formData = new FormData(form);
        const name = formData.get('name');
        const email = formData.get('email');
        const password = formData.get('password');
        const password_conf = formData.get('password_confirmation');
        let error = false;

        if (!name) {
            ErrorUI.show(form.querySelector('[name=name]'), 'Vui lòng nhập họ tên');
            error = true;
        }
        if (!email) {
            ErrorUI.show(form.querySelector('[name=email]'), 'Vui lòng nhập email');
            error = true;
        }
        if (!password) {
            ErrorUI.show(form.querySelector('[name=password]'), 'Vui lòng nhập mật khẩu');
            error = true;
        }
        if (!password_conf) {
            ErrorUI.show(form.querySelector('[name=password_confirmation]'), 'Vui lòng xác nhận mật khẩu');
            error = true;
        }
        if (password && password_conf && password !== password_conf) {
            ErrorUI.show(form.querySelector('[name=password_confirmation]'), 'Mật khẩu xác nhận không khớp');
            error = true;
        }
        if (error) return;

        try {
            await Api.fetch('api/register', {
                method: 'POST',
                body: Object.fromEntries(formData)
            });
            window.location.assign('/');
        } catch (err) {
            const msg = err.data?.errors ? Object.values(err.data.errors).flat().join('<br>') : (err.data?.message || 'Lỗi đăng ký');
            ErrorUI.show(form.querySelector('[name=email]'), msg);
        }
    },
    googleLogin() {
        const width = 600;
        const height = 700;
        const left = (window.innerWidth / 2) - (width / 2);
        const top = (window.innerHeight / 2) - (height / 2);
        const url = "/auth/google";
        window.open(url, 'GoogleLogin', `width=${width},height=${height},top=${top},left=${left},scrollbars=yes,status=yes`);
    }
};

/**
 * Bộ quản lý liên kết (Shorten / Stats / Delete)
 */
const LinkManager = {
    isShortened: false,

    toggleAdvanced() {
        const panel = document.getElementById('advancedPanel');
        const icon = document.getElementById('advancedIcon');
        if (!panel) return;
        if (panel.classList.contains('hidden')) {
            panel.classList.remove('hidden');
            panel.classList.add('grid');
            if (icon) icon.classList.add('rotate-180');
        } else {
            panel.classList.add('hidden');
            panel.classList.remove('grid');
            if (icon) icon.classList.remove('rotate-180');
        }
    },

    async handleShorten(e) {
        e.preventDefault();
        const input = document.getElementById('url');
        const customInput = document.getElementById('customCode');
        const btn = document.getElementById('btnSubmit');

        ErrorUI.clear(e.target);

        if (!input || !input.value.trim()) {
            if (input) {
                ErrorUI.show(input, 'Vui lòng dán liên kết cần rút gọn!');
                input.focus();
            }
            return;
        }

        if (this.isShortened) {
            navigator.clipboard.writeText(input.value);
            const originalText = btn.innerHTML;
            btn.innerHTML = 'COPIED! ✨';
            setTimeout(() => {
                btn.innerHTML = originalText;
            }, 2000);
            return;
        }

        btn.disabled = true;
        btn.innerHTML = '✨ SNAPPING...';

        try {
            const body = { 
                url: input.value,
                password: document.getElementById('linkPassword')?.value,
                expires_at: document.getElementById('expiresAt')?.value,
                click_limit: document.getElementById('clickLimit')?.value,
                title: document.getElementById('metaTitle')?.value,
                description: document.getElementById('metaDescription')?.value,
                thumbnail: document.getElementById('metaThumbnail')?.value,
            };
            if (customInput && customInput.value) body.custom_code = customInput.value;

            const data = await Api.fetch('api/shorten', {
                method: 'POST',
                body: body
            });

            input.value = data.short_url;
            this.isShortened = true;
            btn.innerHTML = 'Sao chép link';
            btn.classList.add('!bg-emerald-600');

            if (data.qr_code && IS_AUTHENTICATED) {
                this.showQR(data.short_url, data.qr_code);
            }

            if (IS_AUTHENTICATED) {
                this.loadStats();
                this.loadLogs();
                this.loadChart();
            }
            Toast.show('Rút gọn liên kết thành công!', 'success');
        } catch (err) {
            if (err.data?.errors) {
                const errors = err.data.errors;
                if (errors.url) ErrorUI.show(input, errors.url[0]);
                if (errors.custom_code) {
                    const customCodeEl = document.getElementById('customCode');
                    if (customCodeEl) ErrorUI.show(customCodeEl, errors.custom_code[0]);
                    else Toast.show(errors.custom_code[0], 'error');
                }
            } else {
                const msg = err.data?.message || 'URL không hợp lệ hoặc mã tùy chỉnh đã tồn tại.';
                ErrorUI.show(input, msg);
            }
            this.resetBtnState();
        } finally {
            btn.disabled = false;
        }
    },

    resetBtnState() {
        this.isShortened = false;
        const btn = document.getElementById('btnSubmit');
        if (btn) {
            btn.innerHTML = 'Rút gọn link ✨';
            btn.classList.remove('!bg-emerald-600');
            btn.disabled = false;
        }
    },

    resetBtn() {
        this.resetBtnState();
        this.currentShortUrl = null;
        const input = document.getElementById('url');
        const customInput = document.getElementById('customCode');
        const clearBtn = document.getElementById('clearUrl');

        if (input) input.value = '';
        if (customInput) customInput.value = '';

        ['linkPassword', 'expiresAt', 'clickLimit', 'metaTitle', 'metaDescription', 'metaThumbnail'].forEach(id => {
            const el = document.getElementById(id);
            if (el) el.value = '';
        });
        
        if (clearBtn) clearBtn.classList.add('hidden');

        const form = document.querySelector('form[onsubmit="LinkManager.handleShorten(event)"]');
        if (form) ErrorUI.clear(form);
    },

    clearInput(id) {
        const input = document.getElementById(id);
        if (input) {
            input.value = '';
            input.focus();
            this.resetBtn();
            const clearBtn = document.getElementById('clearUrl');
            if (clearBtn) clearBtn.classList.add('hidden');
        }
    },

    async loadStats(search = '') {
        const statsBody = document.getElementById('statsBody');
        if (!statsBody) return;

        try {
            const url = search ? `api/stats?search=${encodeURIComponent(search)}` : 'api/stats';
            const data = await Api.fetch(url);
            statsBody.innerHTML = '';

            if (data.length === 0) {
                statsBody.innerHTML = `
                    <div class="p-12 text-center">
                        <p class="text-xs font-bold text-slate-400">Chưa có liên kết nào phù hợp.</p>
                    </div>
                `;
                return;
            }

            const LIMIT = 7;
            data.forEach((link, index) => {
                if (index >= LIMIT) return;
                const menuId = 'menu-' + Math.random().toString(36).substr(2, 8);
                const card = document.createElement('div');
                card.className = "p-4 sm:p-5 hover:bg-indigo-50/30 transition-all group relative border-b border-slate-100 last:border-0 first:rounded-t-2xl last:rounded-b-2xl";
                card.innerHTML = `
                    <div class="flex items-start justify-between gap-3">
                        <div class="flex-1 min-w-0 pr-2 space-y-1.5">
                            <h4 class="text-[11px] font-semibold text-slate-400 truncate" title="${link.original_url}">
                                ${link.original_url.replace(/^https?:\/\//, '')}
                            </h4>
                            <div class="flex flex-wrap items-center gap-2 sm:gap-3">
                                <a href="${link.full_short_url}" target="_blank" class="text-indigo-600 font-bold font-mono text-sm sm:text-base hover:text-indigo-800 transition-colors truncate">
                                    ${link.full_short_url.replace(/^https?:\/\//, '')}
                                </a>
                                <button onclick="Utils.copyToClipboard('${link.full_short_url}', this)" class="bg-indigo-50 hover:bg-indigo-600 hover:text-white text-indigo-600 p-1.5 rounded-lg transition-all shadow-sm active:scale-90" title="Sao chép">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" /></svg>
                                </button>
                            </div>
                            <div class="flex items-center gap-3 pt-0.5">
                                <span class="text-[10px] font-medium text-slate-400 font-mono">${link.created_at}</span>
                                <span class="text-[10px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-100">
                                    ${link.clicks} Click
                                </span>
                            </div>
                        </div>

                        <div class="relative shrink-0 mt-0.5">
                            <button onclick="LinkManager.toggleMenu('${menuId}', this)" class="p-2 text-slate-400 hover:text-indigo-600 hover:bg-slate-100/80 rounded-xl transition-all active:scale-90" title="Tùy chọn">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                </svg>
                            </button>
                            
                            <div id="${menuId}" class="absolute right-0 top-full mt-1.5 w-44 bg-white rounded-2xl shadow-2xl border border-slate-200/80 hidden z-50 overflow-hidden animate-in fade-in zoom-in-95 duration-150">
                                <div class="p-1.5 space-y-0.5">
                                    <a href="/links/${link.short_code}" class="flex items-center gap-2.5 px-3 py-2 rounded-xl text-[11px] font-bold text-slate-700 hover:bg-indigo-50 hover:text-indigo-600 transition-all text-left">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" /></svg>
                                        Thống kê
                                    </a>
                                    <a href="${link.original_url}" target="_blank" class="flex items-center gap-2.5 px-3 py-2 rounded-xl text-[11px] font-bold text-slate-700 hover:bg-indigo-50 hover:text-indigo-600 transition-all text-left">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
                                        Link gốc
                                    </a>
                                    <button onclick="LinkManager.showQR('${link.full_short_url}')" class="w-full flex items-center gap-2.5 px-3 py-2 rounded-xl text-[11px] font-bold text-slate-700 hover:bg-indigo-50 hover:text-indigo-600 transition-all text-left">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm14 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" /></svg>
                                        Mã QR
                                    </button>
                                    <div class="h-px bg-slate-100 my-1"></div>
                                    <button onclick="LinkManager.deleteLink('${link.short_code}')" class="w-full flex items-center gap-2.5 px-3 py-2 rounded-xl text-[11px] font-bold text-rose-500 hover:bg-rose-50 transition-all text-left">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                        Xoá link
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                statsBody.appendChild(card);
            });

            if (data.length > LIMIT) {
                const toggleArea = document.createElement('div');
                toggleArea.className = 'border-t border-slate-100 bg-slate-50/50 rounded-b-2xl';
                toggleArea.innerHTML = `
                    <a href="/links" class="w-full py-3 text-xs font-bold text-indigo-600 hover:text-indigo-800 hover:bg-white transition-all flex items-center justify-center gap-1.5 rounded-b-2xl">
                        <span>Xem toàn bộ ${data.length} liên kết</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6" /></svg>
                    </a>
                `;
                statsBody.appendChild(toggleArea);
            }

            LinkManager.loadChart();
        } catch (e) {
            console.error('Stats loading failed.');
        }
    },

    async loadChart() {
        try {
            const d = await Api.fetch('api/chart');

            const widget = document.getElementById('statsWidget');
            const skeleton = document.getElementById('statsWidgetSkeleton');
            if (skeleton) skeleton.remove();
            if (widget) widget.classList.remove('hidden');

            const setEl = (id, val) => {
                const el = document.getElementById(id);
                if (el) el.innerHTML = val;
            };
            setEl('statTotalLinks', d.total_links);
            setEl('statTodayLinks', `<span class="${d.today_links > 0 ? 'text-emerald-500' : 'text-slate-400'}">+${d.today_links} Hôm nay</span>`);
            setEl('statTotalClicks', d.total_clicks.toLocaleString('vi-VN'));
            setEl('statTodayClicks', `<span class="${d.today_clicks > 0 ? 'text-emerald-500' : 'text-slate-400'}">+${d.today_clicks} Hôm nay</span>`);

            const canvas = document.getElementById('clicksChart');
            if (!canvas || !window.Chart) return;

            const labels = d.daily_clicks.map(item => {
                const dt = new Date(item.date);
                return `${dt.getDate()}/${dt.getMonth() + 1}`;
            });
            const values = d.daily_clicks.map(item => item.count);

            const ctx = canvas.getContext('2d');
            const gradient = ctx.createLinearGradient(0, 0, 0, 100);
            gradient.addColorStop(0, 'rgba(99, 102, 241, 0.35)');
            gradient.addColorStop(1, 'rgba(6, 182, 212, 0.02)');

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels,
                    datasets: [{
                        data: values,
                        borderColor: '#6366f1',
                        borderWidth: 2.5,
                        backgroundColor: gradient,
                        fill: true,
                        tension: 0.4,
                        pointRadius: 2,
                        pointHoverRadius: 5,
                        pointBackgroundColor: '#06b6d4',
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: 'rgba(15, 23, 42, 0.9)',
                            titleFont: { family: 'Outfit', size: 12, weight: '700' },
                            bodyFont: { family: 'Plus Jakarta Sans', size: 12 },
                            padding: 10,
                            cornerRadius: 12,
                            displayColors: false
                        }
                    },
                    scales: {
                        x: {
                            grid: { display: false },
                            ticks: {
                                font: { size: 9, weight: '600' },
                                color: '#94a3b8'
                            }
                        },
                        y: {
                            beginAtZero: true,
                            grid: { color: '#f1f5f9' },
                            ticks: {
                                font: { size: 9, weight: '600' },
                                color: '#94a3b8',
                                stepSize: 1
                            }
                        }
                    }
                }
            });
        } catch (e) {
            console.error('Chart loading failed.', e);
        }
    },

    async loadLogs() {
        const logsBody = document.getElementById('logsBody');
        if (!logsBody) return;

        try {
            const data = await Api.fetch('api/logs');
            logsBody.innerHTML = '';

            if (data.length === 0) {
                logsBody.innerHTML = `
                    <div class="py-10 flex flex-col items-center gap-2 text-center px-6">
                        <p class="text-xs font-bold text-slate-400">Chưa có lượt click nào.</p>
                    </div>
                `;
                return;
            }

            const LIMIT = 7;
            data.forEach((log, index) => {
                if (index >= LIMIT) return;
                const card = document.createElement('div');
                card.className = "p-4 sm:p-5 flex items-start gap-4 hover:bg-emerald-50/20 transition-all border-b border-slate-100 last:border-0";

                const osIcon = log.os === 'Windows' ? '🪟' : (log.os === 'MacOS' ? '🍎' : '📱');
                const browserIcon = log.browser === 'Chrome' ? '🌐' : '🧭';

                card.innerHTML = `
                    <div class="flex-1 min-w-0 space-y-2">
                        <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-1.5 sm:gap-3">
                            <div class="min-w-0 overflow-hidden flex-1 space-y-1">
                                <a href="${log.original_url}" target="_blank" class="text-xs sm:text-sm font-semibold text-slate-700 hover:text-indigo-600 truncate block transition-colors" title="${log.original_url}">
                                    ${log.original_url.replace(/^https?:\/\//, '')}
                                </a>
                                <div class="flex items-center gap-1.5">
                                    <span class="text-xs font-bold font-mono text-indigo-600">
                                        /${log.short_code}
                                    </span>
                                </div>
                            </div>
                            <span class="text-[10px] font-medium font-mono text-slate-400 shrink-0 sm:self-center">${log.created_at}</span>
                        </div>
                        
                        <div class="flex flex-wrap items-center gap-2 text-[10px] font-bold">
                            <span class="inline-flex items-center gap-1 text-emerald-700 bg-emerald-50 px-2.5 py-1 rounded-full border border-emerald-100/80 font-mono">
                                <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full animate-pulse"></span>
                                ${log.ip}
                            </span>
                            <span class="inline-flex items-center gap-1 text-slate-600 bg-slate-50 border border-slate-200/60 px-2 py-1 rounded-full">${osIcon} ${log.os}</span>
                            <span class="inline-flex items-center gap-1 text-slate-600 bg-slate-50 border border-slate-200/60 px-2 py-1 rounded-full">${browserIcon} ${log.browser}</span>
                        </div>
                    </div>
                `;
                logsBody.appendChild(card);
            });

            if (data.length > LIMIT) {
                const toggleArea = document.createElement('div');
                toggleArea.className = 'border-t border-slate-100 bg-slate-50/50';
                toggleArea.innerHTML = `
                    <div class="w-full py-3 text-xs font-bold text-slate-400 uppercase tracking-wider flex items-center justify-center">
                        Hoạt động gần nhất
                    </div>
                `;
                logsBody.appendChild(toggleArea);
            }

        } catch (e) {
            console.error('Logs loading failed.');
        }
    },

    showQR(shortUrl, qrUrl = null) {
        const qrModalImage = document.getElementById('qrModalImage');
        const qrShortUrlDisplay = document.getElementById('qrShortUrlDisplay');
        if (qrModalImage) {
            this.currentShortUrl = shortUrl;
            qrModalImage.src = qrUrl || `https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=${encodeURIComponent(shortUrl)}`;
            
            if (qrShortUrlDisplay) {
                qrShortUrlDisplay.textContent = shortUrl.replace(/^https?:\/\//, '');
            }

            Modal.open('qrModal');
            Toast.show('Đã tạo mã QR! ✨', 'info');
        }
    },

    copyCurrentQRLink() {
        if (this.currentShortUrl) {
            Utils.copyToClipboard(this.currentShortUrl);
        }
    },

    async saveQR() {
        const qrImage = document.getElementById('qrModalImage');
        if (!qrImage || !qrImage.src) return;
        
        try {
            const response = await fetch(qrImage.src);
            const blob = await response.blob();
            const url = window.URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = `LinkSnap_QR_${Math.random().toString(36).substr(2, 6)}.png`;
            document.body.appendChild(a);
            a.click();
            window.URL.revokeObjectURL(url);
            document.body.removeChild(a);
            Toast.show('Đã tải mã QR về máy!', 'success');
        } catch (e) {
            console.error('Save QR error', e);
            Toast.show('Không thể tải mã QR. Vui lòng thử lại.', 'error');
        }
    },

    async shareLink() {
        const url = this.currentShortUrl || document.getElementById('url')?.value;
        if (!url) return;

        if (navigator.share) {
            try {
                await navigator.share({
                    title: 'Chia sẻ liên kết từ LinkSnap',
                    text: 'Truy cập liên kết rút gọn của tôi:',
                    url: url
                });
            } catch (e) {
                if (e.name !== 'AbortError') console.error('Share error', e);
            }
        } else {
            navigator.clipboard.writeText(url);
            Toast.show('Đã copy liên kết vào bộ nhớ tạm!', 'info');
        }
    },

    toggleMenu(menuId, btnElement = null) {
        const menu = document.getElementById(menuId);
        if (!menu) return;
        document.querySelectorAll('[id^="menu-"]').forEach(m => {
            if (m.id !== menuId) m.classList.add('hidden');
        });
        
        const isHidden = menu.classList.contains('hidden');
        if (isHidden) {
            menu.classList.remove('hidden');
            if (btnElement) {
                const rect = menu.getBoundingClientRect();
                const viewportHeight = window.innerHeight;
                if (rect.bottom > viewportHeight - 15) {
                    menu.classList.remove('top-full', 'mt-1.5');
                    menu.classList.add('bottom-full', 'mb-1.5');
                } else {
                    menu.classList.remove('bottom-full', 'mb-1.5');
                    menu.classList.add('top-full', 'mt-1.5');
                }
            }
        } else {
            menu.classList.add('hidden');
        }
    },

    async deleteLink(shortCode) {
        Confirm.show('Liên kết này sẽ bị xóa vĩnh viễn và không thể khôi phục.', async () => {
            try {
                const res = await Api.fetch(`api/delete/${shortCode}`, {
                    method: 'DELETE'
                });
                if (res.success) {
                    Toast.show('Đã xóa liên kết', 'success');
                    this.loadStats();
                    this.loadLogs();
                    this.loadChart();
                }
            } catch (err) {
                const msg = err.data?.error || err.data?.message || 'Không thể xóa liên kết này. Vui lòng thử lại.';
                Toast.show(msg, 'error');
                console.error('Delete error', err);
            }
        }, { title: 'Xác nhận xóa liên kết?' });
    },

    async toggleStatus(shortCode, btnElement = null) {
        try {
            const res = await Api.fetch(`api/links/${shortCode}/toggle-status`, {
                method: 'PATCH'
            });
            if (res.success) {
                Toast.show(res.is_active ? 'Đã bật lại liên kết!' : 'Đã tạm khóa liên kết!', 'success');
                if (btnElement) {
                    if (res.is_active) {
                        btnElement.className = "p-2.5 rounded-xl bg-emerald-50 text-emerald-500 hover:bg-emerald-500 hover:text-white transition-all shadow-sm active:scale-90 mr-3";
                        btnElement.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z" /></svg>`;
                        btnElement.title = "Đang hoạt động (Nhấn để khóa)";
                    } else {
                        btnElement.className = "p-2.5 rounded-xl bg-rose-50 text-rose-500 hover:bg-rose-500 hover:text-white transition-all shadow-sm active:scale-90 mr-3";
                        btnElement.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>`;
                        btnElement.title = "Bị khóa (Nhấn để bật)";
                    }
                } else {
                    window.location.reload();
                }
            }
        } catch (e) {
            Toast.show('Không thể thay đổi trạng thái lúc này.', 'error');
            console.error('Toggle status error', e);
        }
    }
};

/**
 * Tiện ích xử lý chuỗi (Loại bỏ dấu tiếng Việt và ký tự đặc biệt)
 */
const StringHelper = {
    removeAccents(str) {
        return str.normalize('NFD')
            .replace(/[\u0300-\u036f]/g, '')
            .replace(/đ/g, 'd').replace(/Đ/g, 'D')
            .replace(/[^a-zA-Z0-9]/g, '');
    }
};

// Đóng menu khi click ra ngoài
document.addEventListener('click', function(e) {
    if (!e.target.closest('[id^="menu-"]') && !e.target.closest('button[onclick*="toggleMenu"]')) {
        document.querySelectorAll('[id^="menu-"]').forEach(m => m.classList.add('hidden'));
    }
});

// Khởi tạo các sự kiện khi trang đã tải xong (DOMContentLoaded)
document.addEventListener('DOMContentLoaded', () => {
    // Tự động focus vào ô rút gọn link nếu có query param focus=url
    if (window.location.search.includes('focus=url')) {
        const urlInput = document.getElementById('url');
        if (urlInput) {
            setTimeout(() => urlInput.focus(), 300);
        }
        window.history.replaceState({}, document.title, window.location.pathname);
    }

    // Nếu đã đăng nhập, tự động tải danh sách link
    if (IS_AUTHENTICATED) {
        LinkManager.loadStats();
        LinkManager.loadLogs();
        LinkManager.loadChart();
    }

    // Tìm kiếm Link (Debounced)
    const searchInput = document.getElementById('searchLinks');
    if (searchInput) {
        searchInput.addEventListener('input', Utils.debounce((e) => {
            LinkManager.loadStats(e.target.value);
        }, 400));
    }

    // Nút Clear và xử lý input URL
    const mainInput = document.getElementById('url');
    const clearBtn = document.getElementById('clearUrl');

    if (mainInput) {
        mainInput.addEventListener('input', () => {
            if (clearBtn) {
                if (mainInput.value) clearBtn.classList.remove('hidden');
                else clearBtn.classList.add('hidden');
            }
            if (LinkManager.isShortened) LinkManager.resetBtn();
        });
    }

    // Tự động bỏ dấu cho mã tùy chỉnh
    const customInput = document.getElementById('customCode');
    if (customInput) {
        customInput.addEventListener('input', (e) => {
            const originalValue = e.target.value;
            const normalizedValue = StringHelper.removeAccents(originalValue);
            if (originalValue !== normalizedValue) {
                e.target.value = normalizedValue;
            }
        });
    }
    
    // Hành động toàn cục: Luôn nhảy về form rút gọn link
    window.globalActionShortcut = function() {
        const urlInput = document.getElementById('url');
        if (urlInput) {
            window.scrollTo({ top: 0, behavior: 'smooth' });
            urlInput.focus();
        } else {
            window.location.href = '/?focus=url';
        }
    };

    // Shortcut: Cmd+K hoặc Ctrl+K
    document.addEventListener('keydown', (e) => {
        const isK = (e.ctrlKey || e.metaKey) && e.code === 'KeyK';
        if (isK) {
            e.preventDefault();
            e.stopPropagation();
            window.globalActionShortcut();
        }
    });
});
