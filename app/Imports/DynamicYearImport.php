<?php

namespace App\Imports;

use App\Models\Output;
use App\Models\OutputYearData;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;

class DynamicYearImport implements ToCollection
{
    protected $bidang;

    // Constructor to accept bidang
    public function __construct($bidang)
    {
        $this->bidang = $bidang;
    }

    public function collection(Collection $rows)
    {
        // Skip the header row
        $header = $rows->first();
        $rows = $rows->skip(1);

        foreach ($rows as $row) {
            // Create the main output record
            $output = Output::create([
                'kode_ro' => $row[1] ?? "",
                'rincian_output' => $row[2] ?? "",
                'kementerian_lembaga' => $row[3] ?? "",
                'arah_kebijakan' => $row[4] ?? "",
                'fokus_pelaksanaan' => $row[5] ?? "",
                'strategi_terobosan' => $row[6] ?? "",


                'bidang' => $this->bidang // Assign bidang value
            ]);

            // Loop through the years dynamically
            for ($i = 2024; $i <= 2026; $i++) {
                $indexOffset = ($i - 2024) * 4 + 5;

                $target = isset($row[$indexOffset + 2]) ? (is_numeric($row[$indexOffset + 2]) ? (int) $row[$indexOffset + 2] : 0) : 0;
                $capaian = isset($row[$indexOffset + 2]) ? (is_numeric($row[$indexOffset + 2]) ? (int) $row[$indexOffset + 2] : 0) : 0;
                $alokasi_anggaran = isset($row[$indexOffset + 3]) ? (is_numeric($row[$indexOffset + 3]) ? (int) $row[$indexOffset + 3] : 0) : 0;
                $realisasi_anggaran = isset($row[$indexOffset + 4]) ? (is_numeric($row[$indexOffset + 4]) ? (int) $row[$indexOffset + 4] : 0) : 0;

                OutputYearData::create([
                    'rencana_aksi_id' => $output->id,
                    'tahun' => $i,
                    'target' => $target,
                    'capaian' => $capaian,
                    'alokasi_anggaran' => $alokasi_anggaran,
                    'realisasi_anggaran' => $realisasi_anggaran,
                    'tantangan_pelaksanaan' => $row[19] ?? "",
                    'strategi_pelaksanaan' => isset($row[20]) ? substr($row[20], 0, 255) : "",
                    'status_pelaksanaan' => isset($row[21]) ? substr($row[21], 0, 255) : "",
                ]);
            }
        }
    }
}
