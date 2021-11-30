<?php

namespace App\Exceptions\Custom;

use App\Exceptions\Contract\CustomException;
use Exception;

class VoteException extends Exception implements CustomException
{
    /**
     * @param  string  $message
     */
    public function __construct($message = "Vote exception")
    {
        parent::__construct($message, 400);
    }
}
