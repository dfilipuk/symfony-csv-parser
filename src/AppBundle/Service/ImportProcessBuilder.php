<?php

namespace AppBundle\Service;

class ImportProcessBuilder
{
    /**
     * @var FileUtils
     */
    private $fileUtils;

    public function __construct(FileUtils $fileUtils)
    {
        $this->fileUtils = $fileUtils;
    }

    /**
     * @param string $filePath
     * @param bool $testMode
     * @throws \Exception
     *
     * @return string
     */
    public function importData(string $filePath, bool $testMode): string
    {
        $this->fileUtils->checkFilePath($filePath);

        return $this->fileUtils->readFile($filePath);
    }
}