/**
 * LinkSnap - Link Details & Analytics JavaScript
 */

const LinkApi = {
    async updatePwd(event, linkId) {
        event.preventDefault();
        const form = event.target;
        const btn = form.querySelector('button[type="submit"]');
        const input = form.querySelector('input[name="password"]');
        const pwdValue = input.value.trim();
        
        btn.disabled = true;
        btn.innerHTML = '...';
        
        try {
            const body = {};
            if (pwdValue === '') {
                body.remove_password = true;
            } else {
                body.password = pwdValue;
            }

            await Api.fetch(`/api/links/${linkId}`, {
                method: 'PATCH',
                body: body
            });
            Toast.show(pwdValue === '' ? 'Đã gỡ bỏ mật khẩu!' : 'Đã cập nhật mật khẩu!', 'success');
            setTimeout(() => window.location.reload(), 800);
        } catch(err) {
            Toast.show(err.data?.message || 'Có lỗi xảy ra', 'error');
            btn.disabled = false;
            btn.innerHTML = 'LƯU';
        }
    }
};

window.LinkApi = LinkApi;

function initLinkChart(dailyClicks) {
    const canvas = document.getElementById('linkClicksChart');
    if (!canvas || !window.Chart) return;

    const labels = dailyClicks.map(item => {
        const dt = new Date(item.date);
        return `${dt.getDate()}/${dt.getMonth() + 1}`;
    });
    const values = dailyClicks.map(item => item.count);
    const maxVal = Math.max(...values, 1);

    const ctx = canvas.getContext('2d');
    const gradient = ctx.createLinearGradient(0, 0, 0, 260);
    gradient.addColorStop(0, 'rgba(79, 70, 229, 0.22)');
    gradient.addColorStop(1, 'rgba(79, 70, 229, 0)');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels,
            datasets: [{
                label: 'Lượt click',
                data: values,
                borderColor: '#4f46e5',
                borderWidth: 2.5,
                backgroundColor: gradient,
                fill: true,
                tension: 0.35,
                pointRadius: values.map(v => v === maxVal ? 6 : 3),
                pointBackgroundColor: values.map(v => v === maxVal ? '#fff' : '#4f46e5'),
                pointBorderColor: values.map(v => v === maxVal ? '#4f46e5' : '#fff'),
                pointBorderWidth: values.map(v => v === maxVal ? 3 : 2),
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    mode: 'index',
                    intersect: false,
                    backgroundColor: '#0f172a',
                    titleColor: '#94a3b8',
                    bodyColor: '#fff',
                    titleFont: { size: 10, weight: '700', family: "'Be Vietnam Pro', sans-serif" },
                    bodyFont: { size: 14, weight: '800', family: "'Be Vietnam Pro', sans-serif" },
                    padding: 14,
                    cornerRadius: 14,
                    displayColors: false,
                    callbacks: {
                        title: items => items[0].label,
                        label: ctx => `${ctx.parsed.y} click`
                    }
                }
            },
            scales: {
                x: {
                    grid: { display: false },
                    border: { display: false },
                    ticks: { font: { size: 10, weight: '700', family: "'Be Vietnam Pro', sans-serif" }, color: '#94a3b8', maxRotation: 0 }
                },
                y: {
                    beginAtZero: true,
                    grid: { color: '#f1f5f9' },
                    border: { display: false, dash: [4, 4] },
                    ticks: { font: { size: 10, weight: '700', family: "'Be Vietnam Pro', sans-serif" }, color: '#94a3b8', stepSize: 1, precision: 0 }
                }
            }
        }
    });
}

window.initLinkChart = initLinkChart;
