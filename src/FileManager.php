<?php

class FileManager
{
    public static function isValidFile($file)
    {
        return isset($file) && $file['error'] === UPLOAD_ERR_OK;
    }

    public static function processFile($file)
    {
        if (self::isValidFile($file)) {
            $handle = fopen($file['tmp_name'], 'r');
            $matrix = [];

            if ($handle !== false) {
                while (($row = fgetcsv($handle)) !== false) {
                    $matrix[] = $row;
                }
                fclose($handle);
            } else {
                http_response_code(500);
                exit;
            }

            return $matrix;
        } else {
            http_response_code(400);
            exit;
        }
    }
}
