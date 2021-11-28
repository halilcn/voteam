<?php

namespace App\Exceptions\Custom;

use App\Exceptions\Contract\CustomException;
use Exception;


class VotedUserException extends Exception implements CustomException
{
    /**
     * @param  string  $message
     */
    public function __construct($message = "Voted user  exception")
    {
        parent::__construct($message, 400);
    }

}
