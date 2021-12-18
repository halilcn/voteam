<?php

namespace App\Exceptions\Custom;

use App\Exceptions\Contract\CustomException;
use Exception;

class PowerVoteTotalUserPowerException extends Exception implements CustomException
{
    /**
     * @param  string  $message
     */
    public function __construct($message = "Power vote total user power exception")
    {
        parent::__construct($message, 400);
    }
}
