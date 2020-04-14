<?php

namespace Bera\Joy;

use Bera\Joy\BaseLogger;
use Bera\Joy\Interfaces\LoggerInterface;
use Bera\Joy\Interfaces\ErrorLevelInterface;
use Bera\Joy\ErrorLevels;
use Bera\Joy\Exceptions\ErrorLevelNotSupport;
use Bera\Joy\Exceptions\FileResourceException;

class Logger extends BaseLogger implements LoggerInterface
{
    /**
     * @var LOG_SEPARATOR
     */
    const LOG_SEPARATOR = '::';

    /**
     * @param string $file_name
     * @param string $log_path
     */
    public function __construct($file_name = '', $log_path)
    {
        parent::__construct($file_name, $log_path);
    }

    /**
     * @param string $message
     * @return void
     */  
    public function log( $message, $e_level='' ) : void
    {

        if(\is_null($this->file_handle))
            $this->openFileResource();
        $this->errorLevels( new ErrorLevels);

        if(empty($e_level))
            $eLevel = 'INFO';
        else
            $eLevel = $e_level;

        if( !in_array($eLevel, $this->error_level) )
            throw new ErrorLevelNotSupport('error level not supported');
        
        $log_message = $this->formatLogMessage($eLevel, $message);
        $this->writeLog($this->file_handle,$log_message);
    }

    /**
     * wirte log message to a file
     * @param resource $file_handle
     * @param string $message
     * @return void
     */
    public function writeLog( $file_handle, $message ) : void
    {
        if($this->file_handle === false)
            throw new FileResourceException('file is not ready to write');
        fwrite($file_handle, $message);
    }

    /**
     * @param string $e_level
     * @param string $message
     * @return string
     */
    public function formatLogMessage( $e_level, $message ) : string
    {
        return $this->getCurrentDateTime() . ' ' . self::LOG_SEPARATOR . ' ' . $e_level . ' ' . self::LOG_SEPARATOR . ' ' . $message . PHP_EOL;
    }

    /**
     * @param ErrorLevelInterface $e_level
     */
    public function errorLevels(ErrorLevelInterface $e_level) : void
    {   
        $this->error_level = $e_level::getAvailableErrorLevels();
    }

    /**
     * return local date time of kolkata
     * @return string
     */
    public function getCurrentDateTime() : string
    {
        date_default_timezone_set("Asia/Kolkata");
        return date("Y-m-d H:i:s");
    }
}