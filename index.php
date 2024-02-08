<?php

require_once 'src/Application/MatrixOperationHandler.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uri = $_SERVER['REQUEST_URI'];
    $file = $_FILES['file'];
    $handler = new MatrixOperationHandler();
    $handler->processRequest($file, $uri);
} else {
    http_response_code(405);
    echo "Method Not Allowed";
}

