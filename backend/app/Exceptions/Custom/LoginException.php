<?php

namespace App\Exceptions\Custom;

use App\Exceptions\Contract\CustomException;
use Exception;

class LoginException extends Exception implements CustomException
{
    /**
     * @param  string  $message
     */
    public function __construct($message = "login exception")
    {
        parent::__construct($message, 403);
    }
}
