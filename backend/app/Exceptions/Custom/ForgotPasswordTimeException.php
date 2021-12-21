<?php

namespace App\Exceptions\Custom;

use App\Exceptions\Contract\CustomException;
use Exception;

class ForgotPasswordTimeException extends Exception implements CustomException
{
    /**
     * @param  string  $message
     */
    public function __construct($message = "Forgot password time exception")
    {
        parent::__construct($message, 400);
    }
}
