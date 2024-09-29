<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TalentaResource extends JsonResource
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
            'talentaId' => $this->kode_talenta,
            'nama' => $this->nama_talenta,
            'produsen_data' => $this->produsen_data,
            'tahun' => $this->tahun,
            'kecamatan' => $this->kecamatan,
            'kabupaten' => $this->kabkota,
            'provinsi' => $this->provinsi,
            'pendidikan' => PendidikanResource::collection($this->whenLoaded('pendidikan')),
            'prestasi' => PrestasiResource::collection($this->whenLoaded('prestasi')),
            'keahlian' => KeahlianResource::collection($this->whenLoaded('keahlian')),
            'lembaga' => new LembagaResource($this->whenLoaded('lembaga')),
            'bidang' => new BidangResource($this->whenLoaded('bidang')),
            'level_talenta' => new LevelTalentaResource($this->whenLoaded('level_talenta')),
            'province' => new ProvinceResource($this->whenLoaded('province')),
            'regency' => new RegencyResource($this->whenLoaded('regency')),
        ];
    }

    public function with($request)
    {
        return [
            'version' => '1.0.0',
            'author' => 'Manajemen Talenta Nasional',
        ];
    }
}
