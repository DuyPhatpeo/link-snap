<?php

$publicPath = __DIR__.'/public';

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? ''
);

// If request matches a file inside public/, serve it directly
if ($uri !== '/' && is_file($publicPath.$uri)) {
    $ext = pathinfo($publicPath.$uri, PATHINFO_EXTENSION);
    $mimes = [
        'css'  => 'text/css; charset=UTF-8',
        'js'   => 'application/javascript; charset=UTF-8',
        'png'  => 'image/png',
        'jpg'  => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'gif'  => 'image/gif',
        'svg'  => 'image/svg+xml',
        'ico'  => 'image/x-icon',
        'txt'  => 'text/plain; charset=UTF-8',
        'json' => 'application/json',
        'woff' => 'font/woff',
        'woff2'=> 'font/woff2',
        'ttf'  => 'font/ttf',
    ];

    $mime = $mimes[$ext] ?? mime_content_type($publicPath.$uri) ?: 'application/octet-stream';
    header("Content-Type: $mime");
    header("Content-Length: " . filesize($publicPath.$uri));
    readfile($publicPath.$uri);
    exit;
}

require_once __DIR__.'/index.php';
