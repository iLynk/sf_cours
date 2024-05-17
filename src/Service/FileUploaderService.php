<?php

namespace App\Service;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploaderService
{
    private Filesystem $filesystem;

    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
    }
    public function upload(UploadedFile $uploadedFile, string $directory, string $filename): string
    {
        $newFilename = $filename . '.' . $uploadedFile->guessExtension();

        $this->remove($directory, $newFilename);
        $uploadedFile->move('uploads/' . $directory, $newFilename);

        return $newFilename;
    }

    public function remove(string $directory, string $filename): void
    {
        if($this->filesystem->exists('uploads/' . $directory . '/' . $filename)) {
            $this->filesystem->remove('uploads/' . $directory . '/' . $filename);
        }
    }
}