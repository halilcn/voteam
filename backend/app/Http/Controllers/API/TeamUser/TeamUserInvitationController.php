<?php

namespace App\Http\Controllers\API\TeamUser;

use App\Exceptions\Exception;
use App\Http\Controllers\Controller;
use App\Http\Requests\TeamUser\TeamUserInvitationRequest;
use App\Models\Team;
use App\Models\TeamUserInvitation;
use App\Models\User;
use Illuminate\Http\Request;

class TeamUserInvitationController extends Controller
{
    public function store(Team $team, TeamUserInvitationRequest $request)
    {
        //TODO: verilen e-mail sisteme kayıtlı mı ? kayıtlıysa bildirimde gitsin !
        //TODO: email gidecek. Email url nasıl olmalı ?
        //TODO: Eğer üye değilse kayıt/login olup, belirtilen url'e mi gönderilecek ?
        //TODO: Leader ve manager farkı ? Hangileri oluşturabilir ?


        /**/
        //$this->authorize('create', [TeamUserInvitation::class, $team]);

        if ($team->users()->where('email', $request->input('email'))->exists()) {
            return Exception::teamUserInvitationException();
        }

        $team->invitations()->create($request->validated());


        //return $team->invitations()->create();
        return $team->invitations;
    }
}
