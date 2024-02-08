<?php

require_once 'src/FileManager.php';
require_once 'src/Matrix.php';
require_once 'src/ResponseHandler.php';
require_once 'src/Router.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $file = $_FILES['file'];
    $matrixArray = FileManager::processFile($file);
    $matrixObject = new Matrix($matrixArray);
    $handler = new ResponseHandler();
    $handler->show(Router::route($_SERVER['REQUEST_URI'], $matrixObject));
} else {
    http_response_code(405);
    echo "Method Not Allowed";
}

