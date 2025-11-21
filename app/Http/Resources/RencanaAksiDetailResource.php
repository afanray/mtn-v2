<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RencanaAksiDetailResource extends JsonResource
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
            'tahun' => $this->tahun,
            'bulan' => $this->bulan,
            'capaian' => $this->capaian,
            'realisasi_anggaran' => $this->realisasi_anggaran,
            'lokasi_pelaksanaan' => $this->lokasi_pelaksanaan,
            'status_pelaksanaan' => $this->status_pelaksanaan,

        ];
    }
}
