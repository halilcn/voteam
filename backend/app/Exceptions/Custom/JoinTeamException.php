<?php

namespace App\Exceptions\Custom;

use App\Exceptions\Contract\CustomException;
use Exception;

class JoinTeamException extends Exception implements CustomException
{
    /**
     * @param  string  $message
     */
    public function __construct($message = "Join team exception")
    {
        parent::__construct($message, 400);
    }
}
