<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TodoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'task' => $this->task,
            'project_name' => $this->project_name,
            'status' => $this->status,
            'category_id' => $this->category_id,
            'category' => CategoryResource::make($this->whenLoaded('category')),
        ];
    }
}
