<?php

require_once 'src/Domain/FileManager.php';
require_once 'src/Domain/Matrix.php';
require_once 'ResponseHandler.php';
require_once 'Router.php';

class MatrixOperationHandler
{
    public function processRequest($file, $uri)
    {
        $matrixArray = FileManager::processFile($file);
        $matrixObject = Matrix::create($matrixArray);
        ResponseHandler::show(Router::route($uri, $matrixObject));
    }
}
