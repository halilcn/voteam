<?php

namespace App\Http\Resources\TeamUser;

use Illuminate\Http\Resources\Json\JsonResource;

class TeamUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'users' => TeamUserMemberResource::collection($this->users),
            'user_invitations' => TeamUserInvitationResource::collection($this->invitations)
        ];
    }
}
