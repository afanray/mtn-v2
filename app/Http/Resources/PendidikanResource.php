<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PendidikanResource extends JsonResource
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
            'tingkat' => $this->tingkat,
            'name' => $this->name,
            'tgl_lulus' => $this->tgl_lulus,
            'ijazah_path' => $this->ijazah_path,
            'talenta_id' => $this->talenta_id,
        ];
    }
}
