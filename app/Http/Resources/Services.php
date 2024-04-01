<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Services extends JsonResource
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
            "image" => asset('images/services') . "/" . $this->image,
            'created_at' => $this->created_at ?? ''
        ];
    }
}
