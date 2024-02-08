<?php

class ResponseHandler
{
    public function show($response)
    {
        if ($this->isMatrix($response)) {
            foreach ($response as $row) {
                echo implode(', ', $row) . PHP_EOL;
            }
        } elseif ($this->isVector($response)) {
            echo implode(', ', $response) . PHP_EOL;
        } else {
            echo $response . PHP_EOL;
        }
    }

    private function isMatrix($response)
    {
        return is_array($response) && count($response) > 0 && is_array($response[0]);
    }

    private function isVector($response)
    {
        return is_array($response) && count($response) > 0 && !is_array($response[0]);
    }
}
