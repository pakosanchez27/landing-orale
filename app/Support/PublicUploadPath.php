<?php

namespace App\Support;

class PublicUploadPath
{
    public static function make(string $relativePath = ''): string
    {
        $root = rtrim((string) config('uploads.public_root', public_path()), '\\/');
        $relativePath = trim($relativePath, '\\/');

        if ($relativePath === '') {
            return $root;
        }

        return $root . DIRECTORY_SEPARATOR . str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $relativePath);
    }
}
