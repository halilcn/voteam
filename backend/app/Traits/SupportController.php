<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;

trait SupportController
{
    /**
     * @param  callable  $callback
     * @return mixed
     */
    public function transaction(callable $callback): mixed
    {
        return DB::transaction(
            function () use ($callback) {
                return call_user_func($callback);
            }
        );
    }
}
