<?php

namespace App\Http\Resources\TeamUser;

use Illuminate\Http\Resources\Json\JsonResource;

class TeamUserMemberResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'image' => $this->image,
            'team_user_id' => $this->member->id,
            'test' => $this->member->role->name,
            'votes_count' => $this->votes_count
        ];
    }
}
