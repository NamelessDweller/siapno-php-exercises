<?php
declare(strict_types=1);

namespace exercise10\Model;

class FileOperationModel
{
    public function createFile(string $filename): bool
    {
        $directory = __DIR__ . '/../../files/';

        if (!file_exists($directory)) {
            mkdir($directory, 0777, true);
        }

        $filePath = $directory . basename($filename);

        $handle = fopen($filePath, 'w');
        if ($handle === false) {
            return false;
        }

        fclose($handle);
        return true;
    }

    public function writeFile(string $filename, string $content): bool
    {
        $directory = __DIR__ . '/../../files/';
        $filePath = $directory . basename($filename);
        return file_put_contents($filePath, $content) !== false;
    }

    public function readFile(string $filename): ?string
    {
        if (file_exists($filename)) {
            return file_get_contents($filename);
        }
        return null;
    }

    public function deleteFile(string $filename): bool
    {
        if (file_exists($filename) && unlink($filename)) {
            return true;
        }
        return false;
    }
}
