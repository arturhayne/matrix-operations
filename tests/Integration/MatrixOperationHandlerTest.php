<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../src/Application/MatrixOperationHandler.php';

class MatrixOperationHandlerTest extends TestCase
{
    public function testEchoOperation()
    {
        $testFilePath = __DIR__ . '/testfile.csv';

        $csvContent = "1,2,3\n4,5,6\n7,8,9";
        file_put_contents($testFilePath, $csvContent);

        $testFile = ['error' => UPLOAD_ERR_OK, 'tmp_name' => $testFilePath];

        $handler = new MatrixOperationHandler();
        $handler->processRequest($testFile, '/echo');

        $this->expectOutputString("1, 2, 3\n4, 5, 6\n7, 8, 9\n");
        unlink($testFilePath);
    }

    public function testInvertOperation()
    {
        $testFilePath = __DIR__ . '/testfile.csv';
        $csvContent = "1,2,3\n4,5,6\n7,8,9";
        file_put_contents($testFilePath, $csvContent);
        $testFile = ['error' => UPLOAD_ERR_OK, 'tmp_name' => $testFilePath];

        $handler = new MatrixOperationHandler();
        $handler->processRequest($testFile, '/invert');

        $this->expectOutputString("1, 4, 7\n2, 5, 8\n3, 6, 9\n");
        unlink($testFilePath);
    }

    public function testSingleRowFile()
    {
        $testFilePath = __DIR__ . '/singlerowfile.csv';
        $csvContent = '1,2,3';
        file_put_contents($testFilePath, $csvContent);
        $testFile = ['error' => UPLOAD_ERR_OK, 'tmp_name' => $testFilePath];

        $handler = new MatrixOperationHandler();
        $handler->processRequest($testFile, '/echo');

        $this->expectOutputString("1, 2, 3\n");
        unlink($testFilePath);
    }

    public function testEmptyFile()
    {
        $testFilePath = __DIR__ . '/emptyfile.csv';
        file_put_contents($testFilePath, '');
        $testFile = ['error' => UPLOAD_ERR_OK, 'tmp_name' => $testFilePath];

        $handler = new MatrixOperationHandler();
        $handler->processRequest($testFile, '/echo');

        $this->expectOutputString("\n");
        unlink($testFilePath);
    }
}
