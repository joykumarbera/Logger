<?php

namespace Bera\Joy;

use Bera\Joy\Interfaces\ErrorLevelInterface;

class ErrorLevels implements ErrorLevelInterface
{
    /**
     * @return array
     */
    public static function getAvailableErrorLevels(): array
    {
        return array(
            'ERROR',
            'INFO',
            'WARNING'
        );
    }
}