<?php

namespace App\Http\Resources\Vote;

use Illuminate\Http\Resources\Json\ResourceCollection;

class VotesResource extends ResourceCollection
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
            'active' => ActiveVotesResource::collection($this->collection->where('start_date', '<=', now())),
            'next_date' => NextVotesResource::collection($this->collection->where('start_date', '>', now()))
        ];
    }
}
