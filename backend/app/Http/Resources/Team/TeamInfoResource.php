<?php

namespace App\Http\Resources\Team;

use Illuminate\Http\Resources\Json\JsonResource;

class TeamInfoResource extends JsonResource
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
            'image' => $this->image,
            'join_code' => $this->join_code,
            'total_users_count' => $this->users_count,
            'total_started_votes' => $this->votes_count,
            'vote_join_percentage' => $this->vote_join_percentage
        ];
    }
}
