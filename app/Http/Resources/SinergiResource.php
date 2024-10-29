<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SinergiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'produsen_data' => $this->produsen_data,
            'base_url' => $this->base_url,
            'key' => $this->key,
            'method' => $this->method,
            'parameter' => $this->parameter,
            'lembaga' => new LembagaResource($this->whenLoaded('lembaga')),
            'population' => PopulationResource::collection($this->whenLoaded('population')),
        ];
    }
}
