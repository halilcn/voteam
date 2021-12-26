<?php

namespace App\Http\Resources\Vote;

use Illuminate\Http\Resources\Json\JsonResource;

class FinishedVotesResource extends JsonResource
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
            //TODO: burada created date problemi var. Oylama önce bitince tarih nasıl olacak ? created date güncellense
            //TODO: böyle olunca yazılacak cron'da sıkıntı olur mu ?
            'title' => $this->title,
            'type' => $this->type,
            'calculated' => $this->calculation != null,
        ];
    }
}
