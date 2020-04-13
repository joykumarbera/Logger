<?php

namespace Bera\Joy;

use Bera\Joy\Interfaces\ErrorLevelInterface;

class ErrorLevels implements ErrorLevelInterface
{
    public static function getAvailableErrorLevels()
    {
        return array(
            'ERROR',
            'INFO',
            'WARNING'
        );
    }
}