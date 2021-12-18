<?php

namespace App\Exceptions\Custom;

use App\Exceptions\Contract\CustomException;
use Exception;

class PowerVoteUserException extends Exception implements CustomException
{
    /**
     * @param  string  $message
     */
    public function __construct($message = "Power type user exception")
    {
        parent::__construct($message, 400);
    }
}
