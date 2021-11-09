<?php

namespace App\Http\Resources\Vote;

use Illuminate\Http\Resources\Json\JsonResource;

class VotePowerTypeCheckStoreResource extends JsonResource
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
            'team_has_more_than_lower_limit_users' => $this->isHasMoreThanLowerLimitUsers,
            'team_has_active_power_type_vote' => $this->isHasActivePowerTypeVote
        ];
    }
}
