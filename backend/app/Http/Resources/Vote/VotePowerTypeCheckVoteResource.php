<?php

namespace App\Http\Resources\Vote;

use Illuminate\Http\Resources\Json\JsonResource;

class VotePowerTypeCheckVoteResource extends JsonResource
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
            'power_vote_voted' => $this->powerVoteVoted
        ];
    }
}
