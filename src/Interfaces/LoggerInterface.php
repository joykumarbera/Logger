<?php

namespace Bera\Joy\Interfaces; 

interface LoggerInterface
{
    /**
     * @param string
     * @return void
     */
    public function log( $message, $e_level ) : void;
}