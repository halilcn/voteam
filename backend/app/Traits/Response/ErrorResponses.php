<?php

namespace App\Traits\Response;

trait ErrorResponses
{
    use Support;

    /**
     * @param  mixed|string  $data
     * @param  int  $code
     * @return object
     */
    public function errorResponse(mixed $data = 'error', int $code = 400): object
    {
        return $this->handleResponse($data, $code);
    }
}
