<?php

class ResponseHandler
{
    public static function show($response)
    {
        if (self::isMatrix($response)) {
            foreach ($response as $row) {
                echo implode(', ', $row) . PHP_EOL;
            }
        } elseif (is_array($response)) {
            echo empty($response) ? "\n" : implode(', ', $response) . PHP_EOL;
        } else {
            echo $response . PHP_EOL;
        }
    }

    private static function isMatrix($response)
    {
        return is_array($response) && count($response) > 0 && is_array($response[0]);
    }
}
