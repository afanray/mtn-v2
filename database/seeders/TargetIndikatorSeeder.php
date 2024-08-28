<?php

	namespace Database\Seeders;

	use App\Models\TargetIndikator;
  use Illuminate\Database\Seeder;
  use \App\Constants\Common;
  use Illuminate\Support\Facades\DB;

  class TargetIndikatorSeeder extends Seeder
	{
		public function run()
		{
      DB::table('target_indikator')->truncate();
      $riset = Common::indikatorRiset();
      foreach ($riset as $r){
        foreach (Common::getTahun() as $t){
          foreach ($t['data'] as $tahun){
            TargetIndikator::query()->create([
              'bidang_id'=>Common::BIDANG_RISET_ID,
              'field'=>$r['field'],
              'year'=>$tahun
            ]);
          }
        }
      }
      $seni = Common::indikatorSeni();
      foreach ($seni as $r){
        foreach (Common::getTahun() as $t){
          foreach ($t['data'] as $tahun){
            TargetIndikator::query()->create([
              'bidang_id'=>Common::BIDANG_SENI_ID,
              'field'=>$r['field'],
              'year'=>$tahun
            ]);
          }
        }
      }
      $or = Common::indikatorOR();
      foreach ($or as $r){
        foreach (Common::getTahun() as $t){
          foreach ($t['data'] as $tahun){
            TargetIndikator::query()->create([
              'bidang_id'=>Common::BIDANG_OR_ID,
              'field'=>$r['field'],
              'year'=>$tahun
            ]);
          }
        }
      }
		}
	}
