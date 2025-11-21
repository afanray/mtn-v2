<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class MonevResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        return [
            'bidang_id' => $this->bidang_id,
            'arah_kebijakan' => $this->arah_kebijakan,
            'fokus_pelaksanaan' => $this->fokus_pelaksanaan,
            'strategi_terobosan' => $this->strategi_terobosan,
            'kode_ro' => $this->kode_ro,
            'rincian_output' => $this->rincian_output,
            'satuan' => $this->satuan,
            'target' => $this->target,
            'realisasi' => $this->realisasi,
            'realisasi_anggaran' => $this->realisasi_anggaran,
            'alokasi_anggaran' => $this->alokasi_anggaran,
            'lokasi_pelaksanaan_kegiatan' => $this->lokasi_pelaksanaan_kegiatan,
            'instansi_pelaksana' => $this->instansi_pelaksana,
            'nama_program' => $this->nama_program,
            'nama_komponen' => $this->nama_komponen,
            'rencana_aksi_details' => RencanaAksiDetailResource::collection($this->whenLoaded('rencana_aksi_details')),
            'rencana_aksi_pelaksanaan' => new RencanaAksiDetailResource($this->whenLoaded('rencana_aksi_pelaksanaan')),
            'user' => new UserResource($this->whenLoaded('user')),
        ];
    }
}
