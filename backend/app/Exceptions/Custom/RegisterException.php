<?php

namespace App\Exceptions\Custom;

use App\Exceptions\Contract\CustomException;
use Exception;


class RegisterException extends Exception implements CustomException
{
    /**
     * @param  string  $message
     */
    public function __construct($message = "Register  exception")
    {
        parent::__construct($message, 400);
    }

}
