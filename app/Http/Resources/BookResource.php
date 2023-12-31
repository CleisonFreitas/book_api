<?php

namespace App\Http\Resources;

use Carbon\Carbon;
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
            'publisher' => [
                'id' => $this->publisher->id,
                'name' => $this->publisher->name,
                'email' => $this->publisher->email,
            ],
            'index' => IndexResource::collection($this->bookIndex),
            'created_at' => Carbon::parse($this->created_at)->format('d-m-Y h:i:s'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d-m-Y h:i:s'),
            'paginate' => [
                'current_page' => $this->paginate()->currentPage(),
                'per_page' => $this->paginate()->perPage(),
                'last_page' => $this->paginate()->lastPage(),
            ]
        ];
    }
}
