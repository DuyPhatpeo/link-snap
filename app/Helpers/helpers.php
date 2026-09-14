<?php

if (!function_exists('versioned_asset')) {
    /**
     * Generate an asset path with automatic cache busting based on file modification timestamp.
     *
     * @param string $path
     * @return string
     */
    function versioned_asset(string $path): string
    {
        $cleanPath = ltrim($path, '/');
        $realPath = public_path($cleanPath);
        $version = file_exists($realPath) ? filemtime($realPath) : time();
        return asset($cleanPath) . '?v=' . $version;
    }
}
