<?php

namespace App\Traits;

use \Intervention\Image\Facades\Image as InterventionImage;

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

    /**
     * @param  string  $name
     * @return string
     */
    public function createDefaultTeamImage(string $name): string
    {
        return "https://ui-avatars.com/api/?name=${name}&background=random&size=128";
    }
}
