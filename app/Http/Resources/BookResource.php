<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
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
            'description' => $this->description,
            'image' => $this->image,
            'published_date' => $this->published_date,
            'rating' => $this->rating,
            'pages' => $this->pages,
            'quantity' => $this->quantity,
            'ISBN' => $this->ISBN,
            'author' => $this->author,
            'publisher' => $this->publisher,
            'genre' => $this->genre,
            'students' => $this->students,

        ];
    }
}