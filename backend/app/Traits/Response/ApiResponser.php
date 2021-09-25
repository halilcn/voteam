<?php

namespace App\Traits\Response;

use App\Traits\Response\SuccessResponses;
use App\Traits\Response\ErrorResponses;

trait ApiResponser
{
    use SuccessResponses, ErrorResponses;
}
