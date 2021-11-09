<?php

namespace App\Http\Controllers\API\Vote;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\Vote;
use Illuminate\Http\Request;

class VotePowerTypeActionsController extends Controller
{

    public function checkVote(Team $team): bool
    {
        return $team
            ->votes()
            ->where([
                        'type' => Vote::$TYPES['POWER']
                    ])
            ->where('end_date', '<', now())
            ->exists();
    }

    public function checkStore()
    {

    }
}
