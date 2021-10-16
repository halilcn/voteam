<?php

namespace App\Http\Resources\Vote;

use Illuminate\Http\Resources\Json\JsonResource;

class VotesResource extends JsonResource
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
            //active, nex_date ??

            'id' => $this->id,
            'title' => $this->title,
            'type' => $this->type,
            'options' => $this->options,
            'voted_percentage' => '34',
            'end_date' => $this->end_date,
            'is_voted' => false,
        ];
    }
}
