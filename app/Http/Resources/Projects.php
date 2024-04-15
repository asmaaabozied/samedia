<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Projects extends JsonResource
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
            "image" => asset('images/projects') . "/" . $this->image,
            'date' => $this->date_of_birth,
            'client' => $this->client,
            'project_type' => $this->project_type,
            'duration' => $this->duration,
            'created_at' => $this->created_at ?? '',
            'live_link' => $this->live_link,
            'images'=> $this->images,
            'server_url'=> asset('images/projects') 
        ];
    }
}
