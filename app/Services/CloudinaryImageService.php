<?php

namespace App\Services;

use Illuminate\Http\Client\RequestException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use RuntimeException;

class CloudinaryImageService
{
    public function uploadDataUri(string $dataUri, string $folder, string $prefix = 'image'): string
    {
        $this->ensureConfigured();

        $publicId = uniqid($prefix . '_', true);
        $response = $this->cloudinaryHttpClient()
            ->asForm()
            ->timeout(30)
            ->post($this->uploadUrl(), [
                'file' => $dataUri,
                'folder' => trim($folder, '/'),
                'public_id' => $publicId,
                'overwrite' => 'false',
                'api_key' => $this->apiKey(),
                'timestamp' => $timestamp = time(),
                'signature' => $this->signature([
                    'folder' => trim($folder, '/'),
                    'overwrite' => 'false',
                    'public_id' => $publicId,
                    'timestamp' => $timestamp,
                ]),
            ]);

        $this->throwIfFailed($response);

        $secureUrl = $response->json('secure_url');

        if (!is_string($secureUrl) || $secureUrl === '') {
            throw new RuntimeException('Cloudinary no regreso la URL de la imagen.');
        }

        return $secureUrl;
    }

    public function uploadFile(UploadedFile $file, string $folder, string $prefix = 'image'): string
    {
        $this->ensureConfigured();

        $publicId = uniqid($prefix . '_', true);
        $timestamp = time();

        $response = $this->cloudinaryHttpClient()
            ->attach(
            'file',
            file_get_contents($file->getRealPath()),
            $file->getClientOriginalName()
        )
            ->timeout(30)
            ->post($this->uploadUrl(), [
                'folder' => trim($folder, '/'),
                'public_id' => $publicId,
                'overwrite' => 'false',
                'api_key' => $this->apiKey(),
                'timestamp' => $timestamp,
                'signature' => $this->signature([
                    'folder' => trim($folder, '/'),
                    'overwrite' => 'false',
                    'public_id' => $publicId,
                    'timestamp' => $timestamp,
                ]),
            ]);

        $this->throwIfFailed($response);

        $secureUrl = $response->json('secure_url');

        if (!is_string($secureUrl) || $secureUrl === '') {
            throw new RuntimeException('Cloudinary no regreso la URL de la imagen.');
        }

        return $secureUrl;
    }

    public function deleteByUrl(?string $url): void
    {
        if (!$url || !$this->isCloudinaryUrl($url) || !$this->isConfigured()) {
            return;
        }

        $publicId = $this->publicIdFromUrl($url);

        if (!$publicId) {
            return;
        }

        $timestamp = time();

        $this->cloudinaryHttpClient()
            ->asForm()
            ->timeout(15)
            ->post($this->destroyUrl(), [
                'public_id' => $publicId,
                'api_key' => $this->apiKey(),
                'timestamp' => $timestamp,
                'signature' => $this->signature([
                    'public_id' => $publicId,
                    'timestamp' => $timestamp,
                ]),
            ]);
    }

    public function isCloudinaryUrl(string $url): bool
    {
        $host = parse_url($url, PHP_URL_HOST);

        return is_string($host) && Str::contains($host, 'cloudinary.com');
    }

    private function publicIdFromUrl(string $url): ?string
    {
        $path = parse_url($url, PHP_URL_PATH);

        if (!is_string($path) || $path === '') {
            return null;
        }

        $segments = explode('/upload/', trim($path, '/'));

        if (count($segments) !== 2) {
            return null;
        }

        $publicPath = $segments[1];
        $parts = explode('/', $publicPath);

        if (isset($parts[0]) && preg_match('/^v\d+$/', $parts[0])) {
            array_shift($parts);
        }

        $publicPath = implode('/', $parts);
        $publicPath = preg_replace('/\.[a-zA-Z0-9]+$/', '', $publicPath);

        return $publicPath ?: null;
    }

    private function signature(array $params): string
    {
        ksort($params);

        $payload = collect($params)
            ->reject(fn ($value) => $value === null || $value === '')
            ->map(fn ($value, $key) => $key . '=' . $value)
            ->implode('&');

        return sha1($payload . $this->apiSecret());
    }

    private function uploadUrl(): string
    {
        return 'https://api.cloudinary.com/v1_1/' . $this->cloudName() . '/image/upload';
    }

    private function destroyUrl(): string
    {
        return 'https://api.cloudinary.com/v1_1/' . $this->cloudName() . '/image/destroy';
    }

    private function ensureConfigured(): void
    {
        if (!$this->isConfigured()) {
            throw new RuntimeException('Cloudinary no esta configurado. Revisa CLOUDINARY_CLOUD_NAME, CLOUDINARY_API_KEY y CLOUDINARY_API_SECRET en el archivo .env.');
        }
    }

    private function isConfigured(): bool
    {
        return $this->cloudName() !== '' && $this->apiKey() !== '' && $this->apiSecret() !== '';
    }

    private function cloudName(): string
    {
        return (string) config('services.cloudinary.cloud_name');
    }

    private function apiKey(): string
    {
        return (string) config('services.cloudinary.api_key');
    }

    private function apiSecret(): string
    {
        return (string) config('services.cloudinary.api_secret');
    }

    private function cloudinaryHttpClient()
    {
        $client = Http::baseUrl('');

        if (!config('services.cloudinary.verify_ssl', true)) {
            return $client->withoutVerifying();
        }

        return $client;
    }

    private function throwIfFailed($response): void
    {
        if ($response->successful()) {
            return;
        }

        try {
            $response->throw();
        } catch (RequestException $exception) {
            throw new RuntimeException('Cloudinary rechazo la imagen: ' . $exception->getMessage(), 0, $exception);
        }
    }
}
