<?php

namespace App\Traits\Response;

trait SuccessResponses
{
    use Support;

    /**
     * @param  mixed|string  $data
     * @param  int  $code
     * @return object
     */
    public function successResponse(mixed $data = 'Success', int $code = 200): object
    {
        return response()->json($data, $code);
    }

    /**
     * @param  mixed|string  $data
     * @param  int  $code
     * @return object
     */
    public function createdResponse(mixed $data = 'Created', int $code = 201): object
    {
        return response()->json($data, $code);
    }

    /**
     * @param  mixed|string  $data
     * @param  int  $code
     * @return object
     */
    public function noContentResponse(mixed $data = 'No content', int $code = 204): object
    {
        return response()->json($data, $code);
    }
}
