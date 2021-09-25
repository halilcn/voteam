<?php

namespace App\Exceptions\Custom;

use App\Exceptions\Contract\CustomException;
use Exception;


class AuthenticateException extends Exception implements CustomException
{
    /**
     * @param  string  $message
     */
    public function __construct($message = "Authenticate exception")
    {
        parent::__construct($message, 401);
    }

}
