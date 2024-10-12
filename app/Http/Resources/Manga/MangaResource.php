<?php

namespace App\Http\Resources\Manga;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MangaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'sinopse' => $this->sinopse,
            'type' => $this->type,
            'author' => $this->author,
            'cover_image' => $this->cover_image
        ];
    }
}
