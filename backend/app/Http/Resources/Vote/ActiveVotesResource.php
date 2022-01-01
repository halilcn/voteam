<?php

namespace App\Http\Resources\Vote;

use App\Models\Vote;
use Illuminate\Http\Resources\Json\JsonResource;

class ActiveVotesResource extends JsonResource
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
            'id' => $this->id,
            'title' => $this->title,
            'type' => $this->type,
            'options' => $this->options,
            'end_date' => $this->end_date,
            'voted_percentage' => $this->calculated_voted_percentage,
            'is_voted' => $this->votedUsersIds->contains($request->user()->id)
        ];
    }
}
