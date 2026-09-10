{{-- Tab: Thiết kế giao diện (Màu nền, Bio Styling, Nút bấm) --}}
@php $theme = $bioPage->theme_data ?? []; @endphp
<div id="tab-appearance" class="tab-content hidden animate-in fade-in slide-in-from-bottom-4 duration-300">
    <section class="glass-card rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-sm">
        <div class="mb-8">
            <h2 class="text-xl sm:text-2xl font-black font-outfit text-slate-800 tracking-tight">Thiết kế trang</h2>
            <p class="text-slate-400 font-medium text-xs mt-1">Tùy chỉnh phong cách hiển thị trang Bio cá nhân của bạn.</p>
        </div>

        <form onsubmit="Editor.saveInfo(event)" class="space-y-8">
            @csrf
            
            {{-- SECTION 1: Thông tin cơ bản --}}
            <div class="space-y-5">
                <div class="flex items-center gap-3">
                    <h3 class="text-xs font-black font-outfit text-slate-800 uppercase tracking-widest">1. Thông tin cơ bản</h3>
                    <div class="flex-1 h-px bg-slate-100"></div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-[10px] font-black font-outfit text-slate-400 uppercase tracking-widest mb-1.5 ml-1">Tiêu đề (Tên của bạn)</label>
                            <input type="text" name="title" value="{{ $bioPage->title }}" required
                                oninput="Editor.updatePreviewLive('title', this.value)"
                                class="w-full bg-slate-50 border border-slate-200 rounded-2xl py-3 px-4 text-slate-800 font-bold text-xs focus:bg-white focus:border-indigo-500 outline-none transition-all">
                        </div>
                        <div>
                            <label class="block text-[10px] font-black font-outfit text-slate-400 uppercase tracking-widest mb-1.5 ml-1">Tiểu sử ngắn (Bio)</label>
                            <textarea name="bio" rows="3"
                                oninput="Editor.updatePreviewLive('bio', this.value)"
                                class="w-full bg-slate-50 border border-slate-200 rounded-2xl py-3 px-4 text-slate-800 font-bold text-xs focus:bg-white focus:border-indigo-500 outline-none transition-all resize-none">{{ $bioPage->bio }}</textarea>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="relative group">
                            <label class="block text-[10px] font-black font-outfit text-slate-400 uppercase tracking-widest mb-1.5 ml-1">Ảnh đại diện (URL)</label>
                            <div class="relative">
                                <input type="url" name="profile_image" id="profileImageInput" value="{{ $bioPage->profile_image }}" placeholder="https://..."
                                    oninput="Editor.updateAvatarPreview(this.value)"
                                    class="w-full bg-slate-50 border border-slate-200 rounded-2xl py-3 pl-4 pr-12 text-slate-800 font-bold text-xs focus:bg-white focus:border-indigo-500 outline-none transition-all">
                                <div class="absolute right-3 top-1/2 -translate-y-1/2 w-7 h-7 rounded-full overflow-hidden border border-slate-200 shadow-sm">
                                    <img id="profileImagePreview" src="{{ $bioPage->profile_image ?? asset('logo.png') }}" class="w-full h-full object-cover">
                                </div>
                            </div>
                        </div>
                        <div class="p-4 bg-indigo-50/60 rounded-2xl border border-indigo-100/60">
                            <p class="text-[11px] text-indigo-700 font-medium leading-relaxed">Sử dụng ảnh đại diện sắc nét và tiểu sử cô đọng để tạo dấu ấn tốt nhất.</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- SECTION 2: Màu sắc Trang --}}
            <div class="space-y-5 pt-2">
                <div class="flex items-center gap-3">
                    <h3 class="text-xs font-black font-outfit text-slate-800 uppercase tracking-widest">2. Màu sắc chủ đạo</h3>
                    <div class="flex-1 h-px bg-slate-100"></div>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[10px] font-bold text-slate-400 uppercase mb-1.5 ml-1">Màu nền trang</label>
                        <div class="flex items-center gap-3 bg-slate-50 border border-slate-200 p-2 rounded-2xl">
                            <div class="relative w-7 h-7 shrink-0 rounded-lg overflow-hidden border border-slate-200 shadow-sm">
                                <input type="color" name="theme_data[background]" value="{{ $theme['background'] ?? '#f8fafc' }}"
                                    oninput="this.parentElement.nextElementSibling.innerText = this.value.toUpperCase(); Editor.updatePreviewLive('background', this.value)"
                                    class="absolute -inset-2 w-[150%] h-[150%] cursor-pointer">
                            </div>
                            <span class="text-[11px] font-mono font-bold text-slate-700 uppercase">{{ $theme['background'] ?? '#F8FAFC' }}</span>
                        </div>
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-slate-400 uppercase mb-1.5 ml-1">Màu chữ chính & Icon</label>
                        <div class="flex items-center gap-3 bg-slate-50 border border-slate-200 p-2 rounded-2xl">
                            <div class="relative w-7 h-7 shrink-0 rounded-lg overflow-hidden border border-slate-200 shadow-sm">
                                <input type="color" name="theme_data[text_color]" value="{{ $theme['text_color'] ?? '#0f172a' }}"
                                    oninput="this.parentElement.nextElementSibling.innerText = this.value.toUpperCase(); Editor.updatePreviewLive('text_color', this.value)"
                                    class="absolute -inset-2 w-[150%] h-[150%] cursor-pointer">
                            </div>
                            <span class="text-[11px] font-mono font-bold text-slate-700 uppercase">{{ $theme['text_color'] ?? '#0F172A' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- SECTION 3: Tùy chỉnh Bio Typography --}}
            <div class="space-y-5 pt-2">
                <div class="flex items-center gap-3">
                    <h3 class="text-xs font-black font-outfit text-slate-800 uppercase tracking-widest">3. Định dạng chữ Bio</h3>
                    <div class="flex-1 h-px bg-slate-100"></div>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1.5 ml-1">Màu chữ Bio</label>
                        <div class="flex items-center gap-3 bg-slate-50 border border-slate-200 p-2 rounded-2xl">
                            <div class="relative w-7 h-7 shrink-0 rounded-lg overflow-hidden border border-slate-200 shadow-sm">
                                <input type="color" name="theme_data[bio_text_color]" value="{{ $theme['bio_text_color'] ?? '#64748b' }}"
                                    oninput="this.parentElement.nextElementSibling.innerText = this.value.toUpperCase(); Editor.updatePreviewLive('bio_text_color', this.value)"
                                    class="absolute -inset-2 w-[150%] h-[150%] cursor-pointer">
                            </div>
                            <span class="text-[11px] font-mono font-bold text-slate-700 uppercase">{{ $theme['bio_text_color'] ?? '#64748B' }}</span>
                        </div>
                    </div>

                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1.5 ml-1">Màu nền Bio</label>
                        <div class="flex items-center gap-3 bg-slate-50 border border-slate-200 p-2 rounded-2xl">
                            <div class="relative w-7 h-7 shrink-0 rounded-lg overflow-hidden border border-slate-200 shadow-sm">
                                <input type="color" name="theme_data[bio_bg_color]" value="{{ $theme['bio_bg_color'] ?? '#ffffff' }}"
                                    oninput="this.parentElement.nextElementSibling.innerText = (this.value === '#ffffff' ? 'Không có' : this.value.toUpperCase()); Editor.updatePreviewLive('bio_bg_color', this.value)"
                                    class="absolute -inset-2 w-[150%] h-[150%] cursor-pointer">
                            </div>
                            <span class="text-[11px] font-mono font-bold text-slate-700 uppercase">{{ (isset($theme['bio_bg_color']) && $theme['bio_bg_color'] !== 'transparent' && $theme['bio_bg_color'] !== '#ffffff') ? $theme['bio_bg_color'] : 'Không có' }}</span>
                        </div>
                    </div>

                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1.5 ml-1">Căn lề</label>
                        <div class="flex p-1 bg-slate-50 rounded-2xl border border-slate-200">
                            <button type="button" onclick="Editor.setBioAlign('left')" id="align-btn-left"
                                class="bio-align-btn flex-1 py-2 rounded-xl transition-all flex items-center justify-center {{ ($theme['bio_text_align'] ?? 'center') === 'left' ? 'bg-white shadow-sm text-slate-900' : 'text-slate-400 hover:text-slate-600' }}">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h10M4 18h16"/></svg>
                            </button>
                            <button type="button" onclick="Editor.setBioAlign('center')" id="align-btn-center"
                                class="bio-align-btn flex-1 py-2 rounded-xl transition-all flex items-center justify-center {{ ($theme['bio_text_align'] ?? 'center') === 'center' ? 'bg-white shadow-sm text-slate-900' : 'text-slate-400 hover:text-slate-600' }}">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M7 12h10M4 18h16"/></svg>
                            </button>
                            <button type="button" onclick="Editor.setBioAlign('right')" id="align-btn-right"
                                class="bio-align-btn flex-1 py-2 rounded-xl transition-all flex items-center justify-center {{ ($theme['bio_text_align'] ?? 'right') === 'right' ? 'bg-white shadow-sm text-slate-900' : 'text-slate-400 hover:text-slate-600' }}">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M10 12h10M4 18h16"/></svg>
                            </button>
                        </div>
                        <input type="hidden" name="theme_data[bio_text_align]" id="bioTextAlign" value="{{ $theme['bio_text_align'] ?? 'center' }}">
                    </div>

                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1.5 ml-1">Kích cỡ & Độ đậm</label>
                        <div class="grid grid-cols-2 gap-2">
                            <select name="theme_data[bio_text_size]" 
                                onchange="Editor.updatePreviewLive('bio_text_size', this.value)"
                                class="w-full bg-slate-50 border border-slate-200 py-2.5 px-2.5 rounded-xl text-xs font-bold text-slate-700 outline-none focus:bg-white focus:border-indigo-500 transition-all">
                                <option value="text-[12px]" {{ ($theme['bio_text_size'] ?? '') === 'text-[12px]' ? 'selected' : '' }}>Nhỏ</option>
                                <option value="text-[14px]" {{ ($theme['bio_text_size'] ?? 'text-[14px]') === 'text-[14px]' ? 'selected' : '' }}>Vừa</option>
                                <option value="text-[16px]" {{ ($theme['bio_text_size'] ?? '') === 'text-[16px]' ? 'selected' : '' }}>Lớn</option>
                            </select>
                            <select name="theme_data[bio_text_weight]" 
                                onchange="Editor.updatePreviewLive('bio_text_weight', this.value)"
                                class="w-full bg-slate-50 border border-slate-200 py-2.5 px-2.5 rounded-xl text-xs font-bold text-slate-700 outline-none focus:bg-white focus:border-indigo-500 transition-all">
                                <option value="font-normal" {{ ($theme['bio_text_weight'] ?? '') === 'font-normal' ? 'selected' : '' }}>Thường</option>
                                <option value="font-medium" {{ ($theme['bio_text_weight'] ?? 'font-medium') === 'font-medium' ? 'selected' : '' }}>Vừa</option>
                                <option value="font-bold" {{ ($theme['bio_text_weight'] ?? '') === 'font-bold' ? 'selected' : '' }}>Đậm</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            {{-- SECTION 4: Phong cách Nút bấm --}}
            <div class="space-y-5 pt-2">
                <div class="flex items-center gap-3">
                    <h3 class="text-xs font-black font-outfit text-slate-800 uppercase tracking-widest">4. Phong cách nút liên kết</h3>
                    <div class="flex-1 h-px bg-slate-100"></div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-[10px] font-bold text-slate-400 uppercase mb-1.5 ml-1">Kiểu hiển thị</label>
                            <div class="flex p-1 bg-slate-50 rounded-2xl border border-slate-200">
                                <button type="button" onclick="Editor.setButtonType('solid')" id="type-btn-solid"
                                    class="btn-type-btn flex-1 py-2 rounded-xl text-[10px] font-bold uppercase transition-all {{ ($theme['button_type'] ?? 'solid') === 'solid' ? 'bg-white shadow-sm text-slate-900' : 'text-slate-400 hover:text-slate-600' }}">
                                    Đầy
                                </button>
                                <button type="button" onclick="Editor.setButtonType('outline')" id="type-btn-outline"
                                    class="btn-type-btn flex-1 py-2 rounded-xl text-[10px] font-bold uppercase transition-all {{ ($theme['button_type'] ?? '') === 'outline' ? 'bg-white shadow-sm text-slate-900' : 'text-slate-400 hover:text-slate-600' }}">
                                    Viền
                                </button>
                                <button type="button" onclick="Editor.setButtonType('soft')" id="type-btn-soft"
                                    class="btn-type-btn flex-1 py-2 rounded-xl text-[10px] font-bold uppercase transition-all {{ ($theme['button_type'] ?? '') === 'soft' ? 'bg-white shadow-sm text-slate-900' : 'text-slate-400 hover:text-slate-600' }}">
                                    Mờ
                                </button>
                            </div>
                            <input type="hidden" name="theme_data[button_type]" id="buttonType" value="{{ $theme['button_type'] ?? 'solid' }}">
                        </div>

                        <div>
                            <label class="block text-[10px] font-bold text-slate-400 uppercase mb-1.5 ml-1">Độ bo góc</label>
                            <div class="flex p-1 bg-slate-50 rounded-2xl border border-slate-200 overflow-x-auto no-scrollbar">
                                <button type="button" onclick="Editor.setButtonStyle('none')" id="style-btn-none"
                                    class="btn-style-btn flex-1 min-w-[50px] py-2 rounded-xl text-[10px] font-bold uppercase transition-all {{ ($theme['button_style'] ?? '2xl') === 'none' ? 'bg-white shadow-sm text-slate-900' : 'text-slate-400 hover:text-slate-600' }}">
                                    Vuông
                                </button>
                                <button type="button" onclick="Editor.setButtonStyle('xl')" id="style-btn-xl"
                                    class="btn-style-btn flex-1 min-w-[50px] py-2 rounded-xl text-[10px] font-bold uppercase transition-all {{ ($theme['button_style'] ?? '2xl') === 'xl' ? 'bg-white shadow-sm text-slate-900' : 'text-slate-400 hover:text-slate-600' }}">
                                    Vừa
                                </button>
                                <button type="button" onclick="Editor.setButtonStyle('2xl')" id="style-btn-2xl"
                                    class="btn-style-btn flex-1 min-w-[50px] py-2 rounded-xl text-[10px] font-bold uppercase transition-all {{ ($theme['button_style'] ?? '2xl') === '2xl' ? 'bg-white shadow-sm text-slate-900' : 'text-slate-400 hover:text-slate-600' }}">
                                    Lớn
                                </button>
                                <button type="button" onclick="Editor.setButtonStyle('full')" id="style-btn-full"
                                    class="btn-style-btn flex-1 min-w-[50px] py-2 rounded-xl text-[10px] font-bold uppercase transition-all {{ ($theme['button_style'] ?? '2xl') === 'full' ? 'bg-white shadow-sm text-slate-900' : 'text-slate-400 hover:text-slate-600' }}">
                                    Tròn
                                </button>
                            </div>
                            <input type="hidden" name="theme_data[button_style]" id="buttonStyle" value="{{ $theme['button_style'] ?? '2xl' }}">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
                        <div>
                            <label class="block text-[10px] font-bold text-slate-400 uppercase mb-1.5 ml-1">Màu nền nút</label>
                            <div class="flex items-center gap-3 bg-slate-50 border border-slate-200 p-2 rounded-2xl">
                                <div class="relative w-7 h-7 shrink-0 rounded-lg overflow-hidden border border-slate-200 shadow-sm">
                                    <input type="color" name="theme_data[button_bg]" value="{{ $theme['button_bg'] ?? '#4f46e5' }}"
                                        oninput="this.parentElement.nextElementSibling.innerText = this.value.toUpperCase(); Editor.updatePreviewLive('button_bg', this.value)"
                                        class="absolute -inset-2 w-[150%] h-[150%] cursor-pointer">
                                </div>
                                <span class="text-[11px] font-mono font-bold text-slate-700 uppercase">{{ $theme['button_bg'] ?? '#4F46E5' }}</span>
                            </div>
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-slate-400 uppercase mb-1.5 ml-1">Màu chữ nút</label>
                            <div class="flex items-center gap-3 bg-slate-50 border border-slate-200 p-2 rounded-2xl">
                                <div class="relative w-7 h-7 shrink-0 rounded-lg overflow-hidden border border-slate-200 shadow-sm">
                                    <input type="color" name="theme_data[button_text]" value="{{ $theme['button_text'] ?? '#ffffff' }}"
                                        oninput="this.parentElement.nextElementSibling.innerText = this.value.toUpperCase(); Editor.updatePreviewLive('button_text', this.value)"
                                        class="absolute -inset-2 w-[150%] h-[150%] cursor-pointer">
                                </div>
                                <span class="text-[11px] font-mono font-bold text-slate-700 uppercase">{{ $theme['button_text'] ?? '#FFFFFF' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-4 border-t border-slate-100 flex justify-end">
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold font-outfit px-7 py-3 rounded-2xl shadow-sm transition-all active:scale-95 text-xs uppercase tracking-wider">
                    Lưu cài đặt giao diện ✨
                </button>
            </div>
        </form>
    </section>
</div>
