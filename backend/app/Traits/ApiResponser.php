<?php

namespace App\Traits;

trait ApiResponser
{
    /**
     * @param  mixed|null  $data
     * @param  string  $message
     * @param  int  $code
     * @return object
     */
    protected function success(mixed $data = 'success', int $code = 200): object
    {
        return response()->json($data, $code);
    }

    protected function error(mixed $data = 'error', int $code = 400): object
    {
        return response()->json($data, $code);
    }
}
