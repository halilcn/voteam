<?php

namespace App\Exceptions\Custom;

use App\Exceptions\Contract\CustomException;
use Exception;

class PowerVoteTypeException extends Exception implements CustomException
{
    /**
     * @param  string  $message
     */
    public function __construct($message = "Power type vote exception")
    {
        parent::__construct($message, 400);
    }
}
