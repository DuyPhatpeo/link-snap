<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đang xử lý đăng nhập...</title>
</head>
<body data-error="{{ $error ?? '' }}" data-home-url="{{ url('/') }}">
    <script src="{{ asset('js/auth-callback.js') }}"></script>
</body>
</html>
