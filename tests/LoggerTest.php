<?php

use PHPUnit\Framework\TestCase;
use Bera\Joy\Logger;

class LoggerTest extends TestCase
{
    protected $logger;

    protected function setUp(): void 
    {
        $this->logger = new Logger('log.txt', __DIR__);
    }

    public function test_Log_Message_Separator()
    {
        $this->expectOutputString('::');
        print Logger::LOG_SEPARATOR;
    }

    public function test_Open_A_File_Strem()
    {
        $this->logger->openFileResource();
        $this->assertIsResource($this->logger->file_handle);
        $this->assertNotNull($this->logger->file_handle);
    }

    public function test_Close_A_File_Strem()
    {
        $this->logger->openFileResource();
        $this->logger->closeFileResource();
        $this->assertNull($this->logger->file_handle);
    }

    public function test_Log_File_Path()
    {
        $this->assertEquals(__DIR__, $this->logger->log_path);
    }

    public function test_After_Log_File_handle_Is_Null()
    {
        $this->logger->log('dev msg');
        $this->assertNull($this->logger->file_handle);
    }
}