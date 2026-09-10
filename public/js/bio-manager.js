/**
 * LinkSnap - Bio Page Manager Script
 * Handles creation modal, bio page actions, and API communication.
 */
const BioManager = {
    openCreateModal() {
        const modal = document.getElementById('createBioModal');
        if (modal) {
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            setTimeout(() => {
                modal.querySelector('input[name="title"]')?.focus();
            }, 100);
        }
    },

    closeCreateModal() {
        const modal = document.getElementById('createBioModal');
        if (modal) {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
    },

    async handleCreate(e) {
        e.preventDefault();
        const form = e.target;
        const formData = new FormData(form);
        const data = Object.fromEntries(formData.entries());
        const btn = form.querySelector('button[type="submit"]');
        const defaultText = btn ? btn.innerText : 'TIẾP TỤC THIẾT LẬP →';

        try {
            if (btn) {
                btn.disabled = true;
                btn.innerText = 'ĐANG XỬ LÝ...';
            }
            
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') 
                           || document.querySelector('input[name="_token"]')?.value 
                           || data._token;

            const response = await fetch('/api/bio', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify(data)
            });

            const result = await response.json();

            if (response.ok) {
                if (window.Toast) Toast.show(result.message, 'success');
                window.location.assign(result.redirect);
            } else {
                if (window.Toast) Toast.show(result.message || 'Lỗi xảy ra!', 'error');
            }
        } catch (err) {
            if (window.Toast) Toast.show('Đã xảy ra lỗi hệ thống.', 'error');
        } finally {
            if (btn) {
                btn.disabled = false;
                btn.innerText = defaultText;
            }
        }
    },

    async deletePage(id) {
        const executeDelete = async () => {
            try {
                const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') 
                               || document.querySelector('input[name="_token"]')?.value;

                const response = await fetch(`/api/bio/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                });

                const result = await response.json();
                if (response.ok) {
                    if (window.Toast) Toast.show(result.message, 'success');
                    setTimeout(() => location.reload(), 400);
                } else {
                    if (window.Toast) Toast.show(result.message || 'Không thể xóa trang', 'error');
                }
            } catch (err) {
                if (window.Toast) Toast.show('Lỗi kết nối máy chủ.', 'error');
            }
        };

        if (window.Confirm) {
            Confirm.show('Bạn có chắc chắn muốn xóa Bio Page này? Hành động này không thể hoàn tác.', executeDelete, {
                title: 'Xác nhận xóa Bio?'
            });
        } else {
            if (confirm('Bạn có chắc chắn muốn xóa Bio Page này?')) {
                executeDelete();
            }
        }
    }
};

window.BioManager = BioManager;
