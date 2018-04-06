<?php

namespace AppBundle\Service;

class FileUtils
{
    /**
     * @param string $filePath
     * @throws \Exception
     */
    public function checkFilePath(string $filePath)
    {
        if (!file_exists($filePath)) {
            throw new \Exception('file doesn\'t exists');
        }
    }

    /**
     * @param string $filePath
     * @return string
     * @throws \Exception
     */
    public function readFile(string $filePath): string
    {
        $content = @file_get_contents($filePath);

        if ($content === false) {
            throw new \Exception('unable to read file');
        }

        return $content;
    }
}