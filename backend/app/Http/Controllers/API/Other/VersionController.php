<?php

namespace App\Http\Controllers\API\Other;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VersionController extends Controller
{
    /**
     * @return object
     */
    public function __invoke(): object
    {
        return $this->successResponse([
                                          'version' => 'v1',
                                          'last_update' => '2022-01-29'
                                      ]);
    }
}
