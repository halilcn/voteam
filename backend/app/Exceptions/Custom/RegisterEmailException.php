<?php

namespace App\Exceptions\Custom;

use App\Exceptions\Contract\CustomException;
use Exception;


class RegisterEmailException extends Exception implements CustomException
{
    /**
     * @param  string  $message
     */
    public function __construct($message = "Register email exception")
    {
        parent::__construct($message, 409);
    }

}
