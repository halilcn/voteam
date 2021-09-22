<?php

namespace App\Traits;

trait Image
{
    /**
     * @param  string  $nameAndSurname
     * @return string
     */
    public function createDefaultProfileImage(string $nameAndSurname): string
    {
        return "https://ui-avatars.com/api/?name=${nameAndSurname}&background=f2f2f2&size=128";
    }
}
