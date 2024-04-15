<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Sliders extends JsonResource
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
            'name_lan' => $this->name,
            'description_lan' => $this->description,
            "media" => asset('uploads') . "/" . $this->media,
            'created_at' => $this->created_at ?? ''
        ];
    }
}
