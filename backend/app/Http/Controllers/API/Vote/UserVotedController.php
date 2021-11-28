<?php

namespace App\Http\Controllers\API\Vote;

use App\Http\Controllers\Controller;
use App\Models\Vote;
use Illuminate\Http\Request;

class UserVotedController extends Controller
{
    public function store(Vote $vote)
    {
        //TODO: Policy, oy verince all_users_voted alanı manipüle etme ?
        //TODO: Oy verdiyse tekrar oy veremez.
        return $vote;
    }
}
