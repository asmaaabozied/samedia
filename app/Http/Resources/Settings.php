<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Settings extends JsonResource
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

            'terms_conditions' => $this->terms_conditions[$header],
            'website_address' => $this->website_address[$header],
            'description' => $this->description[$header],
            'closing_message' => $this->closing_message[$header],

            'email' => $this->email,
            'website_link' => $this->website_link,
            'theme' => $this->theme,
            'key_words' => $this->key_words,
            'twitter' => $this->twitter,
            'facebook' => $this->facebook,
            'instagram' => $this->instagram,
            'snapchat' => $this->snapchat,
            'youtube' => $this->youtube,
            'phone_one' => $this->phone_one,
            'phone_two' => $this->phone_two,
            'google_play' => $this->google_play,
            'play_store' => $this->play_store,
            'time_difference' => $this->time_difference,
            'closing' => $this->closing,




            'created_at' => $this->created_at ?? ''


        ];
    }
}
