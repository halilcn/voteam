<?php

namespace App\Exceptions\Custom;

use App\Exceptions\Contract\CustomException;
use Exception;

class UserPowerException extends Exception implements CustomException
{
    /**
     * @param  string  $message
     */
    public function __construct($message = "User power exception")
    {
        parent::__construct($message, 400);
    }
}
