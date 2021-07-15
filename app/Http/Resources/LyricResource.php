<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LyricResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'band' => $this->band->name,
            'album' => $this->album->name,
        ];
    }
}
