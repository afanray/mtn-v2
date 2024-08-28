<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\TargetIndikator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      $this->call(UserSeeder::class);
      $this->call(BidangSeeder::class);
      $this->call(BidangFokusSeeder::class);
      $this->call(InputDataSeeder::class);
      $this->call(BidangFokusSeeder::class);
      $this->call(RefPrizesSeeder::class);
      $this->call(ProvinceSeeder::class);
      $this->call(RegenciesSeeder::class);
      $this->call(LevelTalentaSeeder::class);
      $this->call(TargetIndikatorSeeder::class);
      DB::table('ajang_talenta')->truncate();
      DB::table('anugrah_talenta')->truncate();
      DB::table('data_dasar')->truncate();
      DB::table('data_dasar_input_status')->truncate();
      DB::table('data_indikator')->truncate();
      DB::table('highlight_talenta')->truncate();
      DB::table('lembaga')->truncate();
      DB::table('talenta')->truncate();
      DB::table('users_input')->truncate();
    }
}
