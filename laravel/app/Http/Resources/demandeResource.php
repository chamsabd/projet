<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class demandeResource extends JsonResource
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
            'date_demande' =>$this->date_demande,
            'formation_id' =>$this->formation_id,
            'utilisateur_id' =>$this->utilisateur_id,
        ];
    }
}
