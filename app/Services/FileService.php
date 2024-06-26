<?php

namespace App\Services;

use File;

class FileService
{
    public function getFilename(mixed $file): string
    {
        return $file->getClientOriginalName();
    }

    public function uploadFileToPublic(mixed $file, string $filename, string $path): void
    {
        $directoryPath = public_path($path);

        if (!File::isDirectory($directoryPath))
            $this->createDirectory($directoryPath);

        $file->move($directoryPath, $filename);
    }

    private function createDirectory(string $path): void
    {
        File::makeDirectory($path, $mode = 0777, true, true);
    }
}
