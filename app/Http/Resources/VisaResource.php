<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VisaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'number' => $this->number,
            'expried_month' => $this->expried_month,
            'expried_year' => $this->expried_year,
            'cvv' => $this->cvv,
            'owner_name' => $this->owner_name,
            'category_id' => $this->category_id,
            'category' => CategoryResource::make($this->whenLoaded('category')),
        ];
    }
}
