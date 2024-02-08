<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../src/Matrix.php';

class MatrixTest extends TestCase
{
    public function testEcho()
    {
        $matrixArray = [[1, 2, 3], [4, 5, 6], [7, 8, 9]];
        $matrix = new Matrix($matrixArray);

        $this->assertEquals($matrixArray, $matrix->echo());
    }

    public function testInvert()
    {
        $matrixArray = [[1, 2, 3], [4, 5, 6], [7, 8, 9]];
        $matrix = new Matrix($matrixArray);

        $expectedInverted = [[1, 4, 7], [2, 5, 8], [3, 6, 9]];

        $this->assertEquals($expectedInverted, $matrix->invert());
    }

    public function testFlatten()
    {
        $matrixArray = [[1, 2, 3], [4, 5, 6], [7, 8, 9]];
        $matrix = new Matrix($matrixArray);

        $expectedFlattened = [1, 2, 3, 4, 5, 6, 7, 8, 9];

        $this->assertEquals($expectedFlattened, $matrix->flatten());
    }

    public function testSum()
    {
        $matrixArray = [[1, 2, 3], [4, 5, 6], [7, 8, 9]];
        $matrix = new Matrix($matrixArray);

        $expectedSum = 45;

        $this->assertEquals($expectedSum, $matrix->sum());
    }

    public function testMultiply()
    {
        $matrixArray = [[1, 2, 3], [4, 5, 6], [7, 8, 9]];
        $matrix = new Matrix($matrixArray);

        $expectedProduct = 362880;

        $this->assertEquals($expectedProduct, $matrix->multiply());
    }
}
