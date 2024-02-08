<?php

require_once __DIR__ . '/../Exceptions/OperationNotFoundException.php';

class Router
{
    public static function route($uri, $matrixObject)
    {
        switch ($uri) {
            case '/echo':
                return $matrixObject->echo();
                break;
            case '/invert':
                return $matrixObject->invert();
                break;
            case '/flatten':
                return $matrixObject->flatten();
                break;
            case '/sum':
                return $matrixObject->sum();
                break;
            case '/multiply':
                return $matrixObject->multiply();
                break;
            default:
                throw new OperationNotFoundException($uri);
                break;
        }
    }
}
