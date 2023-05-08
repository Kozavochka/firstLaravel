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
            'is_free' => $this->is_free,
            'club_id' => $this->club_id,
        ];
    }
}
