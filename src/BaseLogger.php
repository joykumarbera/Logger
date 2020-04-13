<?php

namespace Bera\Joy;

use InvalidArgumentException;
use Bera\Joy\Exceptions\FileNotWritableException;

abstract class BaseLogger
{
    /**
     * @var $file_name
     */
    public $file_name = 'log.txt';

    /**
     * @var $file_handle
     */
    public $file_handle = null;
    
    /**
     * @var $error_level;
     */
    public $error_level;

    /**
     * @var $log_path
     */
    public $log_path;

    /**
     * @param string $file_name
     * @param string $log_path
     * @return void
     */
    public function __construct( $file_name = '', $log_path)
    {
        if(!empty($file_name))
        {
            $this->file_name = $file_name;
        }
        $this->log_path = $log_path;
    }

    /**
     * open a file for write
     * @return void
     */
    public function openFileResource() : void
    {
        $file = $this->generateFilePath();
        if(file_exists($file))
        {
            if(!is_writable($file))
            {
                throw new FileNotWritableException('file is not writable');
            }
            $this->file_handle = fopen($file,'a');
        }
        else
        {
            $this->file_handle = fopen($file,'w');
        }
    }


    /**
     * close a file
     * @return void
     */
    public function closeFileResource() : void
    {
        if($this->file_handle !== false)
        {
            fclose($this->file_handle);
            $this->file_handle = null;
        }
    }

    /**
     * generate file path for open
     * @return string
     */
    public function generateFilePath() : string
    {
        if( empty($this->file_name) )
            throw new InvalidArgumentException('file name can not be empty');
        
        if( empty($this->log_path) )
            throw new InvalidArgumentException('log file path must be given');

        return $this->log_path . '/' . $this->file_name;
    }
}