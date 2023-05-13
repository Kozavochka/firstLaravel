<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PlayerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    //Преобразование в JSON формат
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'age' => $this->age,
//            'is_free' => $this->is_free,
            'club' => $this->club?->name,
            'price' => $this->player_price,
            'league' => $this->player_league->name,
        ];
    }
}
