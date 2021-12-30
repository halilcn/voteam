<?php

namespace App\Http\Resources\Vote;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class FinishedVoteDetailResource extends JsonResource
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
            'data' => $this->calculation->data[$request->user()->language],
            'title' => $this->title,
            'type' => $this->type,
            'end_date' => $this->end_date,
            'total_voting_day' => Carbon::parse($this->end_date)->diffInDays($this->start_date)
        ];
    }
}
