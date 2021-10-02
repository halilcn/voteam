<?php

namespace App\Http\Resources\Team;

use Illuminate\Http\Resources\Json\JsonResource;

class TeamResource extends JsonResource
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
            'join_code' => $this->join_code,
            'key' => $this->key,
            'name' => $this->name,
            'image' => $this->image,
            'users_count' => $this->users_count,
        ];
    }
}
