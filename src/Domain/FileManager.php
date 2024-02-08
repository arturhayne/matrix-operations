<?php

require_once __DIR__ . '/../Exceptions/InvalidFileException.php';
require_once __DIR__ . '/../Exceptions/FileDoesntExistException.php';

class FileManager
{
    public static function isValidFile($file)
    {
        return isset($file) && $file['error'] === UPLOAD_ERR_OK;
    }

    public static function processFile($file)
    {
        if (!file_exists($file['tmp_name'])) {
            throw new FileDoesntExistException($file['tmp_name']);
        }

        if (!self::isValidFile($file)) {
            throw new InvalidFileException($file['tmp_name']);
        }

        $handle = fopen($file['tmp_name'], 'r');

        $matrix = [];

        while (($row = fgetcsv($handle)) !== false) {
            $matrix[] = $row;
        }
        fclose($handle);

        return $matrix;
    }
}
