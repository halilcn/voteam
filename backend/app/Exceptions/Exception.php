<?php

namespace App\Exceptions;

/**
 * Custom Exceptions
 * @method static loginException($message = '')
 * @method static authenticateException($message = '')
 * @method static registerEmailException($message = '')
 * @method static registerException($message = '')
 * @method static joinTeamException($message = '')
 * @method static powerVoteTypeException($message = '')
 */
class Exception
{
    /**
     * @param  string  $name
     * @param  array  $arguments
     * @return Exception
     */
    public static function __callStatic(string $name, array $arguments): Exception
    {
        $namespace = 'App\Exceptions\\Custom\\'.ucfirst($name);
        if (isset($arguments[0])) {
            throw new $namespace($arguments[0]);
        }
        throw new $namespace();
    }
}
