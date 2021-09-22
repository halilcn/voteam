<?php

namespace App\Exceptions\Custom;

use Exception;
use Throwable;

class LoginException extends Exception
{
    /**
     * CustomException constructor.
     *
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = "login exception", $code = 400, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
