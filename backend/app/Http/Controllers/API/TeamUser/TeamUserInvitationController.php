<?php

namespace App\Http\Controllers\API\TeamUser;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeamUser\TeamUserInvitationRequest;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamUserInvitationController extends Controller
{
    public function store(Team $team, TeamUserInvitationRequest $request)
    {
        //TODO: Policy ? Rol kontrol ?
        //TODO: verilen e-mail sisteme kayıtlı mı ? kayıtlıysa bildirimde gitsin !
        // TODO: eğer üyeyse. exception dönsün. frontend bunu belirtsin.
        //TODO: email gidecek. Email url nasıl olmalı ?
        //TODO: Eğer üye değilse kayıt/login olup, belirtilen url'e mi gönderilecek ?

        $team->invitations()->create($request->validated());


        //return $team->invitations()->create();
        return $team->invitations;
    }
}
