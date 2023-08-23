<?php

namespace App\Http\Resources;

use App\Http\Resources\AuthorResource;
use App\Http\Resources\GenreResource;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public static $wrap='book';
    public function toArray($request): array
    {
        return [
            'id'=>$this->resource->id,
            'title'=>$this->resource->title,
            'number_of_pages'=>$this->resource->number_of_pages,
            'genre'=>new GenreResource($this->resource->genre),
            'author'=>new AuthorResource($this->resource->author),
            'user'=>new UserResource($this->resource->user),
        ];
    }
}
