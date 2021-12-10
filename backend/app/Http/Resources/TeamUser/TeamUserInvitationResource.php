<?php

namespace App\Http\Resources\TeamUser;

use Illuminate\Http\Resources\Json\JsonResource;

class TeamUserInvitationResource extends JsonResource
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
            'email' => $this->email,
            'created_at' => $this->created_at
        ];
    }
}
