<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Teams extends JsonResource
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
            'title' => $this->title,
            'name_lan' => $this->name,
            'description_lan' => $this->description,
            "image" => asset('images/teams') . "/" . $this->image,
            'created_at' => $this->created_at ?? ''
        ];
    }
}
