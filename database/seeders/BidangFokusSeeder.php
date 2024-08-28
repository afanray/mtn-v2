<?php

namespace Database\Seeders;

use App\Models\BidangFokus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BidangFokusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      DB::table('bidang_fokus')->truncate();
      $lists = ['Transportasi','Rekayasa Keteknikan',"Pangan","Multidisiplin dan Lintas Sektoral","Kesehatan",
        "Pertahanan dan Keamanan","Energi","Sosial Humaniora Pendidikan Seni dan Budaya","Kemaritiman"];
      foreach ($lists as $l){
        BidangFokus::query()->create([
          'name'=> $l
        ]);
      }
    }
}
