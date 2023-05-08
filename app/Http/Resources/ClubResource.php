<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClubResource extends JsonResource
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
        'name' => $this->name,
        'players_count' => $this->players_count,
        'description' => $this->description,
        'sponsor' => $this?->sponsor?->name,
        'players' => PlayerResource::collection($this->players),
        ];

    }
}
