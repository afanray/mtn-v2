<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PrestasiResource extends JsonResource
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
            'nama_prestasi' => $this->nama_prestasi,
            'deskripsi' => $this->deskripsi,
            'bidang' => $this->bidang,
            'tanggal_perolehan' => $this->tanggal_perolehan,
            'penyelenggara' => $this->penyelenggara,
            'tingkat' => $this->tingkat,
            'medali' => $this->medali,
            'skor' => $this->skor,
            'talenta_id' => $this->talenta_id,
        ];
    }
}
