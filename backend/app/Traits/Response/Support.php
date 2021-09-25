<?php

namespace App\Traits\Response;

trait Support
{
    /**
     * @param  mixed  $data
     * @param  int  $code
     * @return object
     */
    function handleResponse(mixed $data, int $code): object
    {
        return response()->json($data, $code);
    }
}
