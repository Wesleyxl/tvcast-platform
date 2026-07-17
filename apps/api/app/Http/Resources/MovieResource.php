<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'num' => $this->num,
            'name' => $this->name,
            'stream_type' => $this->stream_type,
            'stream_id' => $this->stream_id,
            'stream_icon' => $this->stream_icon,
            'rating' => $this->rating,
            'rating_5based' => $this->rating_5based,
            'added' => $this->added,
            'is_adult' => $this->is_adult,
            'category_id' => $this->category_id,
            'container_extension' => $this->container_extension,
        ];
    }
}
