<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đang xử lý đăng nhập...</title>
</head>
<body data-error="{{ $error ?? '' }}" data-home-url="{{ url('/') }}">
    <script>
        const { error, homeUrl } = document.body.dataset;

        if (error) {
            if (window.opener) {
                if (window.opener.Toast) {
                    window.opener.Toast.show(error, 'error');
                }
                window.close();
            } else {
                window.location.href = homeUrl + "?error=" + encodeURIComponent(error);
            }
        } else {
            if (window.opener) {
                // Send success notification to parent window or simply reload
                window.opener.location.reload();
                window.close();
            } else {
                window.location.href = homeUrl;
            }
        }
    </script>
</body>
</html>
