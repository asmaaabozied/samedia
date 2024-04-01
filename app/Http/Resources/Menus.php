<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Menus extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $header = $request->header('accept-language');
        return [
            'id' => $this->id,
            'name' => $this->name,
            'url' => $this->url,
            'order' => $this->order,
            'created_at' => $this->created_at ?? ''
        ];
    }
}
