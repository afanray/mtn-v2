<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class KeahlianResource extends JsonResource
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
            'nama_keahlian' => $this->nama_keahlian,
            'deskripsi' => $this->deskripsi,
            'talenta_id' => $this->talenta_id,
        ];
    }
}
