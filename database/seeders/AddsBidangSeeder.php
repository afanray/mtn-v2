<?php

namespace Database\Seeders;

use App\Models\Bidang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddsBidangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      Bidang::query()->create([
        'name'=> 'Seni dan Budaya'
      ]);
      Bidang::query()->create([
        'name'=> 'Olahraga'
      ]);
    }
}
