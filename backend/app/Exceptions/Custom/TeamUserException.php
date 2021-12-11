<?php

namespace App\Exceptions\Custom;

use App\Exceptions\Contract\CustomException;
use Exception;


class TeamUserException extends Exception implements CustomException
{
    /**
     * @param  string  $message
     */
    public function __construct($message = "Team user exception")
    {
        parent::__construct($message, 400);
    }

}
