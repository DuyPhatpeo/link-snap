/**
 * LinkSnap - Bio Page Editor JavaScript
 * Handles tabs switching, real-time live preview updates, link modal and drag & drop reordering.
 */

const Editor = {
    platforms: {
        facebook: { 
            regex: /(facebook\.com|fb\.com|fb\.watch)/i, 
            name: "Facebook", 
            icon: `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>` 
        },
        instagram: { 
            regex: /instagram\.com/i, 
            name: "Instagram", 
            icon: `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>` 
        },
        tiktok: { 
            regex: /tiktok\.com/i, 
            name: "TikTok", 
            icon: `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6"><path d="M9 12a4 4 0 1 0 4 4V4a5 5 0 0 0 5 5"/></svg>` 
        },
        youtube: { 
            regex: /(youtube\.com|youtu\.be)/i, 
            name: "YouTube", 
            icon: `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.42a2.78 2.78 0 0 0-1.94 2C1 8.11 1 12 1 12s0 3.89.46 5.58a2.78 2.78 0 0 0 1.94 2C5.12 20 12 20 12 20s6.88 0 8.6-.42a2.78 2.78 0 0 0 1.94-2C23 15.89 23 12 23 12s0-3.89-.46-5.58z"/><polygon points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02"/></svg>` 
        },
        github: { 
            regex: /github\.com/i, 
            name: "GitHub", 
            icon: `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6"><path d="M15 22v-4a4.8 4.8 0 0 0-1-3.5c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 2 5 2 5 2c-.3 1.15-.3 2.35 0 3.5A5.403 5.403 0 0 0 4 9c0 3.5 3 5.5 6 5.5-.39.49-.68 1.05-.85 1.65-.17.6-.22 1.23-.15 1.85v4"/><path d="M9 18c-4.51 2-5-2-7-2"/></svg>` 
        }
    },

    getConfig() {
        return window.BIO_CONFIG || {
            bioPageId: "",
            avatarPlaceholder: "",
            csrfToken: document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || "",
            indexRoute: "/bio"
        };
    },

    init() {
        const urlInput = document.getElementById("linkUrl");
        if (urlInput) {
            urlInput.addEventListener("input", (e) => this.detectPlatform(e.target.value));
        }

        // Initialize drag & drop sorting if Sortable is present
        if (typeof Sortable !== 'undefined') {
            this.initSortable();
        } else {
            document.addEventListener('DOMContentLoaded', () => {
                if (typeof Sortable !== 'undefined') this.initSortable();
            });
        }
    },

    initSortable() {
        const bindSortable = (id) => {
            const el = document.getElementById(id);
            if (el) {
                Sortable.create(el, { 
                    handle: '.drag-handle', 
                    animation: 200, 
                    onEnd: () => this.reorder() 
                });
            }
        };
        bindSortable('socialIconsList'); 
        bindSortable('buttonLinksList');
    },

    setTab(tab) {
        document.querySelectorAll(".tab-btn, .mobile-tab-btn").forEach(btn => {
            btn.classList.remove("active", "bg-white", "shadow-sm", "text-slate-900", "text-slate-800");
            btn.classList.add("text-slate-400");
        });
        document.querySelectorAll(".tab-content").forEach(c => c.classList.add("hidden"));

        const btn = document.getElementById(`tab-btn-${tab}`);
        if (btn) { 
            btn.classList.add("active", "bg-white", "shadow-sm", "text-slate-900"); 
            btn.classList.remove("text-slate-400"); 
        }

        const mBtn = document.getElementById(`tab-btn-${tab}-mobile`);
        if (mBtn) { 
            mBtn.classList.add("bg-white", "shadow-sm", "text-slate-800"); 
            mBtn.classList.remove("text-slate-400"); 
        }

        const cont = document.getElementById(`tab-${tab}`);
        if (cont) cont.classList.remove("hidden");
    },

    detectPlatform(url) {
        if (!url) return;
        const labelInput = document.getElementById("linkLabel");
        const iconInput = document.getElementById("linkIcon");
        for (const [key, platform] of Object.entries(this.platforms)) {
            if (platform.regex.test(url)) {
                this.setType("social_icon");
                if (labelInput && !labelInput.value) labelInput.value = platform.name;
                if (iconInput) iconInput.value = platform.icon;
                break;
            }
        }
    },

    openLinkModal() {
        document.getElementById("linkForm").reset();
        document.getElementById("linkIdInput").value = "";
        this.setType("button");
        document.getElementById("modalTitle").innerText = "Thêm liên kết";
        document.getElementById("linkModal").classList.remove("hidden");
    },

    closeLinkModal() { 
        document.getElementById("linkModal").classList.add("hidden"); 
    },

    openEditModal(btn) {
        document.getElementById("linkIdInput").value = btn.getAttribute("data-id");
        document.getElementById("linkLabel").value = btn.getAttribute("data-label");
        document.getElementById("linkUrl").value = btn.getAttribute("data-url");
        document.getElementById("linkIcon").value = btn.getAttribute("data-icon") || "";
        this.setType(btn.getAttribute("data-type") || "button");
        document.getElementById("modalTitle").innerText = "Chỉnh sửa liên kết";
        document.getElementById("linkModal").classList.remove("hidden");
    },

    async deleteLink(id) {
        const execute = async () => {
            const config = this.getConfig();
            const r = await fetch(`/api/bio/links/${id}`, { 
                method: "DELETE", 
                headers: { "X-CSRF-TOKEN": config.csrfToken } 
            });
            if (r.ok) { 
                if (window.Toast) Toast.show("Đã xóa liên kết!"); 
                location.reload(); 
            }
        };

        if (window.Confirm) {
            Confirm.show("Bạn có chắc muốn xóa liên kết này?", execute);
        } else {
            if (confirm("Xóa liên kết này?")) execute();
        }
    },

    async deleteBio() {
        const execute = async () => {
            const config = this.getConfig();
            const r = await fetch(`/api/bio/${config.bioPageId}`, { 
                method: "DELETE", 
                headers: { "X-CSRF-TOKEN": config.csrfToken } 
            });
            if (r.ok) location.href = config.indexRoute;
        };

        if (window.Confirm) {
            Confirm.show("Bạn có chắc muốn xóa toàn bộ Bio Page này? Hành động này không thể hoàn tác.", execute);
        } else {
            if (confirm("Xóa Bio Page này?")) execute();
        }
    },

    refreshPreview() {
        const d = document.getElementById("previewFrame");
        const m = document.getElementById("previewFrameMobile");
        if (d && d.contentWindow) d.contentWindow.location.reload();
        if (m && m.contentWindow) m.contentWindow.location.reload();
    },

    setBioAlign(align) {
        document.getElementById("bioTextAlign").value = align;
        document.querySelectorAll(".bio-align-btn").forEach(b => { 
            b.classList.remove("bg-white", "shadow-sm", "text-slate-900"); 
            b.classList.add("text-slate-400"); 
        });
        document.getElementById(`align-btn-${align}`)?.classList.add("bg-white", "shadow-sm", "text-slate-900");
        this.updatePreviewLive('bio_text_align', align);
    },

    setButtonStyle(style) {
        document.getElementById("buttonStyle").value = style;
        document.querySelectorAll(".btn-style-btn").forEach(b => { 
            b.classList.remove("bg-white", "shadow-sm", "text-slate-900"); 
            b.classList.add("text-slate-400"); 
        });
        document.getElementById(`style-btn-${style}`)?.classList.add("bg-white", "shadow-sm", "text-slate-900");
        this.updatePreviewLive('button_style', style);
    },

    setButtonType(type) {
        document.getElementById("buttonType").value = type;
        document.querySelectorAll(".btn-type-btn").forEach(b => { 
            b.classList.remove("bg-white", "shadow-sm", "text-slate-900"); 
            b.classList.add("text-slate-400"); 
        });
        document.getElementById(`type-btn-${type}`)?.classList.add("bg-white", "shadow-sm", "text-slate-900");
        this.updatePreviewLive('button_type', type);
    },

    updatePreviewLive(key, value) {
        const d = document.getElementById("previewFrame");
        const m = document.getElementById("previewFrameMobile");
        const update = (f) => {
            if (!f || !f.contentDocument) return;
            const doc = f.contentDocument;
            switch(key) {
                case 'background': 
                    doc.body.style.backgroundColor = value; 
                    break;
                case 'text_color': 
                    const t = doc.getElementById('preview-title'); 
                    if (t) t.style.color = value; 
                    doc.querySelectorAll('.social-icon-wrap').forEach(i => i.style.color = value); 
                    break;
                case 'bio_text_color': 
                    const bt = doc.getElementById('preview-bio-text'); 
                    if (bt) bt.style.color = value; 
                    break;
                case 'bio_bg_color': 
                    const bc = doc.getElementById('preview-bio-container'); 
                    if (bc) { 
                        bc.style.backgroundColor = value; 
                        if (value !== 'transparent' && value !== '#ffffff') {
                            bc.classList.add('px-6', 'py-4', 'rounded-3xl', 'shadow-sm', 'border', 'border-black/5'); 
                        } else {
                            bc.classList.remove('px-6', 'py-4', 'rounded-3xl', 'shadow-sm', 'border', 'border-black/5'); 
                        }
                    } 
                    break;
                case 'bio_text_align': 
                    const bp = doc.getElementById('preview-bio-text'); 
                    if (bp) bp.style.textAlign = value; 
                    break;
                case 'bio_text_size': 
                    const bs = doc.getElementById('preview-bio-text'); 
                    if (bs) { 
                        bs.classList.remove('text-[12px]', 'text-[14px]', 'text-[16px]'); 
                        bs.classList.add(value); 
                    } 
                    break;
                case 'bio_text_weight': 
                    const bw = doc.getElementById('preview-bio-text'); 
                    if (bw) { 
                        bw.classList.remove('font-normal', 'font-medium', 'font-bold'); 
                        bw.classList.add(value); 
                    } 
                    break;
                case 'button_bg': 
                    doc.querySelectorAll('.bio-link-btn').forEach(b => b.style.backgroundColor = value); 
                    break;
                case 'button_text': 
                    doc.querySelectorAll('.bio-link-btn').forEach(b => b.style.color = value); 
                    break;
                case 'button_type': 
                    doc.querySelectorAll('.bio-link-btn').forEach(b => { 
                        const bg = document.querySelector('input[name="theme_data[button_bg]"]')?.value || '#2563eb'; 
                        b.style.backgroundColor = value === 'solid' ? bg : 'transparent'; 
                        b.style.border = value === 'outline' ? `2px solid ${bg}` : 'none'; 
                        b.style.color = value === 'solid' ? '#fff' : bg; 
                    }); 
                    break;
                case 'button_style': 
                    doc.querySelectorAll('.bio-link-btn').forEach(b => { 
                        b.classList.remove('rounded-none', 'rounded-xl', 'rounded-2xl', 'rounded-full'); 
                        b.classList.add(`rounded-${value}`); 
                    }); 
                    break;
                case 'title': 
                    const pt = doc.getElementById('preview-title'); 
                    if (pt) pt.innerText = value; 
                    break;
                case 'bio': 
                    const pb = doc.getElementById('preview-bio-text'); 
                    if (pb) pb.innerText = value; 
                    break;
            }
        };
        update(d); 
        update(m);
    },

    async saveInfo(e) {
        e.preventDefault();
        const f = e.target;
        const fd = new FormData(f);
        const data = {};
        const td = {};
        for (const [k, v] of fd.entries()) { 
            if (k.startsWith('theme_data[')) { 
                const tk = k.match(/\[(.*?)\]/)[1]; 
                td[tk] = v; 
            } else {
                data[k] = v; 
            }
        }
        data.theme_data = td;
        const config = this.getConfig();
        const r = await fetch(`/api/bio/${config.bioPageId}`, { 
            method: "PATCH", 
            headers: { 
                "Content-Type": "application/json", 
                "X-CSRF-TOKEN": config.csrfToken 
            }, 
            body: JSON.stringify(data) 
        });
        if (r.ok) {
            if (window.Toast) Toast.show("Đã lưu cài đặt giao diện!");
        }
    },

    async saveLink(e) {
        e.preventDefault();
        const f = e.target;
        const fd = new FormData(f);
        const data = Object.fromEntries(fd.entries());
        const id = data.link_id;
        const config = this.getConfig();
        const url = id ? `/api/bio/links/${id}` : `/api/bio/${config.bioPageId}/links`;
        const r = await fetch(url, { 
            method: id ? "PATCH" : "POST", 
            headers: { 
                "Content-Type": "application/json", 
                "X-CSRF-TOKEN": config.csrfToken 
            }, 
            body: JSON.stringify(data) 
        });
        if (r.ok) location.reload();
    },

    async reorder() {
        const items = document.querySelectorAll("#socialIconsList [data-sort-id], #buttonLinksList [data-sort-id]");
        const order = Array.from(items).map(i => i.getAttribute("data-sort-id"));
        const config = this.getConfig();
        await fetch(`/api/bio/${config.bioPageId}/reorder`, { 
            method: "POST", 
            headers: { 
                "Content-Type": "application/json", 
                "X-CSRF-TOKEN": config.csrfToken 
            }, 
            body: JSON.stringify({ order }) 
        });
    },

    setType(type) {
        document.getElementById("linkType").value = type;
        const b = document.getElementById("type-btn-button");
        const s = document.getElementById("type-btn-social_icon");
        if (type === "button") { 
            b.classList.add("bg-white", "shadow-sm"); 
            s.classList.remove("bg-white", "shadow-sm"); 
        } else { 
            s.classList.add("bg-white", "shadow-sm"); 
            b.classList.remove("bg-white", "shadow-sm"); 
        }
    },

    updateAvatarPreview(v) { 
        const i = document.getElementById("profileImagePreview"); 
        if (i) i.src = v || this.getConfig().avatarPlaceholder; 
    },

    copyBioLink(b) { 
        navigator.clipboard.writeText(b.getAttribute("data-url")); 
        if (window.Toast) Toast.show("Đã sao chép link Bio!"); 
    }
};

window.Editor = Editor;

// Auto init when script loads
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => Editor.init());
} else {
    Editor.init();
}
