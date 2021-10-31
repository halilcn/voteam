<?php

namespace App\Http\Resources\Vote;

use Illuminate\Http\Resources\Json\JsonResource;

class NextVotesResource extends JsonResource
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
            'title' => $this->title,
            'type' => $this->type,
            'start_date' => $this->start_date,
        ];
    }
}
