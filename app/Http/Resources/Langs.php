<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Langs extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $header = $request->header('accept-language');
        return [
            'id' => $this->id,
            'name' => $this->value[$header],
            'name_lan' => $this->value,
            'title' => $this->item_name,
            'item_id' => $this->item_id,
            'created_at' => $this->created_at ?? ''


        ];
    }
}
