<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AaccountResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'login_url' => $this->login_url,
            'image' => $this->image,
            'category_id' => $this->category_id,
            'category' => CategoryResource::make($this->whenLoaded('category')),
        ];
    }
}
