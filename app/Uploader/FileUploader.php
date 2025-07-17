<?php

declare(strict_types=1);

namespace App\Uploader;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileUploader
{
    protected $disk;
    protected $basePath;

    public function __construct(string $disk = 'public', string $basePath = 'uploads')
    {
        $this->disk = $disk;
        $this->basePath = $basePath;
    }

    public function upload(UploadedFile $file, string $subPath = ''): array
    {
        $fileName = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
        $path = trim($this->basePath . DIRECTORY_SEPARATOR . $subPath, " /\\");
        $filePath = $file->storeAs($path, $fileName, $this->disk);

        return [
            'filePath' => $filePath,
            'fileName' => $fileName,
            'originalFileName' => $file->getClientOriginalName(),
            'fileSize' => $file->getSize(),
            'mimeType' => $file->getMimeType(),
        ];
    }

    public function delete(string $filePath): bool
    {
        return Storage::disk($this->disk)->delete($filePath);
    }
}
