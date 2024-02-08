<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../src/Domain/FileManager.php';

class FileManagerTest extends TestCase
{
    public function testIsValidFile()
    {
        $validFile = ['error' => UPLOAD_ERR_OK];
        $invalidFile = ['error' => UPLOAD_ERR_NO_FILE];

        $this->assertTrue(FileManager::isValidFile($validFile));
        $this->assertFalse(FileManager::isValidFile($invalidFile));
    }

    public function testProcessFile()
    {
        $testFilePath = __DIR__ . '/testfile.csv';

        $csvContent = "1,2,3\n4,5,6\n7,8,9";
        file_put_contents($testFilePath, $csvContent);

        $testFile = ['error' => UPLOAD_ERR_OK, 'tmp_name' => $testFilePath];

        $matrix = FileManager::processFile($testFile);
        $expectedMatrix = [['1', '2', '3'], ['4', '5', '6'], ['7', '8', '9']];
        $this->assertEquals($expectedMatrix, $matrix);

        unlink($testFilePath);
    }

    public function testInvalidFile()
    {
        $testFilePath = __DIR__ . '/testfile.csv';

        $csvContent = "1,2,3\n4,5,6\n7,8,9";
        file_put_contents($testFilePath, $csvContent);

        $testFile = ['error' => UPLOAD_ERR_OK, 'tmp_name' => $testFilePath];

        $matrix = FileManager::processFile($testFile);
        $expectedMatrix = [['1', '2', '3'], ['4', '5', '6'], ['7', '8', '9']];
        $this->assertEquals($expectedMatrix, $matrix);

        unlink($testFilePath);
    }

    public function testProcessFileDoesNotExist()
    {
        $this->expectException(FileDoesntExistException::class);
        $this->expectExceptionMessage('File "bli" does not exist.');
        $fakeFile = ['error' => UPLOAD_ERR_OK, 'tmp_name' => 'bli'];
        FileManager::processFile($fakeFile);
    }
}
