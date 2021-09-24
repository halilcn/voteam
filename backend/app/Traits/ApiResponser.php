<?php

namespace App\Traits;

trait ApiResponser
{
    public function errorResponse(mixed $data = 'error', int $code = 400): object
    {
        return response()->json($data, $code);
    }

    /**
     * @param  mixed|null  $data
     * @param  string  $message
     * @param  int  $code
     * @return object
     */
    protected function successResponse(mixed $data = 'success', int $code = 200): object
    {
        return response()->json($data, $code);
    }

    protected function createdResponse(mixed $data = 'created', int $code = 201): object
    {
        return response()->json($data, $code);
    }

    protected function error(mixed $data = 'error', int $code = 400): object
    {
        return response()->json($data, $code);
    }
}
