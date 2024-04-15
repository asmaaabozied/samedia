<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Images extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $arr = [];
        dd($this);
        foreach($this as $img){
            array_push($arr, asset('images/projects') . "/" . $img->url);
        }
        return $arr;
    }
}
