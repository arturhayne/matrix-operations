<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../src/Domain/Matrix.php';
require_once __DIR__ . '/../../src/Application/Router.php';

class RouterTest extends TestCase
{
    /**
     * @dataProvider routerProvider
     */
    public function testRouter($uri)
    {
        $method = str_replace('/', '', $uri);
        $matrixMock = $this->createMock(Matrix::class);
        $matrixMock->expects($this->once())
                   ->method($method);
        Router::route($uri, $matrixMock);
    }

    public static function routerProvider()
    {
        return [
            ['/echo'],
            ['/invert'],
            ['/flatten'],
            ['/sum'],
            ['/multiply'],
        ];
    }

    public function testInvalidRoute()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Operation "/invalid" not found.');
        $matrixMock = $this->createMock(Matrix::class);
        Router::route('/invalid', $matrixMock);
    }
}
