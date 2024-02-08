<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../src/Application/ResponseHandler.php';

class ResponseHandlerTest extends TestCase
{
    public function testShowWithMatrix()
    {
        $handler = new ResponseHandler();
        $matrix = [['1', '2', '3'], ['4', '5', '6'], ['7', '8', '9']];

        $this->expectOutputString("1, 2, 3\n4, 5, 6\n7, 8, 9\n");
        $handler->show($matrix);
    }

    public function testShowWithVector()
    {
        $handler = new ResponseHandler();
        $vector = ['1', '2', '3'];

        $this->expectOutputString("1, 2, 3\n");
        $handler->show($vector);
    }

    public function testShowWithScalarValue()
    {
        $handler = new ResponseHandler();
        $scalarValue = 'Hello, World!';

        $this->expectOutputString("Hello, World!\n");
        $handler->show($scalarValue);
    }

    public function testShowWithEmptyArray()
    {
        $handler = new ResponseHandler();
        $emptyArray = [];

        $this->expectOutputString("\n");
        $handler->show($emptyArray);
    }
}
