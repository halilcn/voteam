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
        $DEFAULT_PROFILE_IMAGES = [
            'https://avatars.dicebear.com/api/big-smile/your-custom-seed.svg?scale=82&translateX=2&translateY=-5',
            'https://avatars.dicebear.com/api/micah/your-custom-seed.svg?scale=71&translateY=-2',
            'https://avatars.dicebear.com/api/miniavs/your-custom-seed.svg?scale=71&translateX=4&translateY=-17',
            'https://avatars.dicebear.com/api/personas/your-custom-seed.svg?scale=79&translateX=3&translateY=-5',
            'https://avatars.dicebear.com/api/pixel-art/your-custom-seed.svg?scale=73&translateX=1'
        ];

        return $DEFAULT_PROFILE_IMAGES[rand(0, count($DEFAULT_PROFILE_IMAGES) - 1)];
    }

    /**
     * @param  string  $name
     * @return string
     */
    public function createDefaultTeamImage(string $name): string
    {
        $DEFAULT_TEAM_IMAGES = [
            [
                'background' => 'F2F2F2',
                'font' => '222222'
            ],
            [
                'background' => 'f1f4fa',
                'font' => '1d6ce7'
            ]
        ];

        $selectedSettings = $DEFAULT_TEAM_IMAGES[rand(0, count($DEFAULT_TEAM_IMAGES) - 1)];

        return "https://ui-avatars.com/api/?name=${name}&background=${selectedSettings['background']}&color=${selectedSettings['font']}&size=128";
    }
}
