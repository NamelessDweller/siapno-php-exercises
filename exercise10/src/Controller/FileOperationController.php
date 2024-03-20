<?php
declare(strict_types=1);

namespace exercise10\Controller;

use exercise10\Model\FileOperationModel;

class FileOperationController
{
    private FileOperationModel $model;

    public function __construct(FileOperationModel $model)
    {
        $this->model = $model;
    }

    public function createFile(string $filename): bool
    {
        $info = pathinfo($filename);
        if (!isset ($info['extension'])) {
            $filename .= '.txt';
        }
        return $this->model->createFile($filename);
    }

    public function writeFile(string $filename, string $content): bool
    {
        return $this->model->writeFile($filename, $content);
    }

    public function readFile(string $filename): ?string
    {
        return $this->model->readFile($filename);
    }

    public function deleteFile(string $filename): bool
    {
        return $this->model->deleteFile($filename);
    }
}