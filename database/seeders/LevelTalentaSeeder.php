<?php

namespace Database\Seeders;

use App\Models\Bidang;
use App\Models\LevelTalenta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelTalentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('level_talenta')->truncate();
        LevelTalenta::query()->create([
          'bidang_id'=> 1,
          'name'=> 'Pra Bibit Talenta'
        ]);
        LevelTalenta::query()->create([
          'bidang_id'=> 1,
          'name'=> 'Bibit Talenta'
        ]);
        LevelTalenta::query()->create([
          'bidang_id'=> 1,
          'name'=> 'Talenta Potensial'
        ]);
        LevelTalenta::query()->create([
          'bidang_id'=> 1,
          'name'=> 'Talenta Unggul'
        ]);

        LevelTalenta::query()->create([
          'bidang_id'=> 2,
          'name'=> 'Pra Bibit'
        ]);
        LevelTalenta::query()->create([
          'bidang_id'=> 2,
          'name'=> 'Bibit'
        ]);
        LevelTalenta::query()->create([
          'bidang_id'=> 2,
          'name'=> 'Potensial'
        ]);
        LevelTalenta::query()->create([
          'bidang_id'=> 2,
          'name'=> 'Unggul'
        ]);

        LevelTalenta::query()->create([
          'bidang_id'=> 3,
          'name'=> 'Bibit'
        ]);
        LevelTalenta::query()->create([
          'bidang_id'=> 3,
          'name'=> 'Potensial'
        ]);
        LevelTalenta::query()->create([
          'bidang_id'=> 3,
          'name'=> 'Unggul'
        ]);
    }
}
