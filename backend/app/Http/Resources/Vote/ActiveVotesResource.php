<?php

namespace App\Http\Resources\Vote;

use App\Models\TeamUser;
use App\Models\VotedUser;
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
            'voted_percentage' => TeamUser::where('team_id','12')->count()/VotedUser::where('vote_id') // $request->user()->id,//34, toplam kullanıcı sayısı/oy veren kullanıcı sayısı
            'is_voted' => false, //
        ];
    }
}
