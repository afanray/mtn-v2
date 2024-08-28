<?php

namespace Database\Seeders;

use App\Models\Bidang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BidangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bidang')->truncate();
        Bidang::query()->create([
          'name'=> 'Riset dan Inovasi'
        ]);
        Bidang::query()->create([
          'name'=> 'Seni dan Budaya'
        ]);
        Bidang::query()->create([
          'name'=> 'Olahraga'
        ]);
    }
}
