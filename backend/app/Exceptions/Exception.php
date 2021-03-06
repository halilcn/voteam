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
 * @method static votedUserException($message = '')
 * @method static voteException($message = '')
 * @method static userPowerException($message = '')
 * @method static teamUserInvitationException($message = '')
 * @method static teamUserException($message = '')
 * @method static powerVoteTotalUserPowerException($message = '')
 * @method static powerVoteUserException($message = '')
 * @method static forgotPasswordException($message = '')
 * @method static forgotPasswordTimeException($message = '')
 * @method static teamSettingException($message = '')
 * @method static voteCalculatedException($message = '')
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
