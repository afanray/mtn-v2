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
            'bidang' => $this->bidang,
            'produsen_data' => $this->produsen_data,
            'tahun' => $this->tahun,
            'kecamatan' => $this->kecamatan,
            'kabupaten' => $this->kabkota,
            'provinsi' => $this->provinsi,
            'pendidikan' => PendidikanResource::collection($this->pendidikan),
            'prestasi' => PrestasiResource::collection($this->prestasi),
            'keahlian' => KeahlianResource::collection($this->keahlian),
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
