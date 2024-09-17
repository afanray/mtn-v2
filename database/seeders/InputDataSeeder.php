<?php

namespace Database\Seeders;

use App\Http\Request\DataOlahragaRequest;
use App\Http\Request\DataRisetRequest;
use App\Http\Request\DataSeniBudayaRequest;
use App\Models\InputDataMapping;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InputDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      DB::table('input_data_mapping')->truncate();
      $req = new DataRisetRequest();
      foreach ($req->attributes() as $key=>$attr){
        if($key !== 'year'){
          InputDataMapping::query()->create([
            'field'=>$key,
            'label'=>$attr,
            'bidang_id'=>1
          ]);
        }
      }
      $req = new DataSeniBudayaRequest();
      foreach ($req->attributes() as $key=>$attr){
        if($key !== 'year'){
          InputDataMapping::query()->create([
            'field'=>$key,
            'label'=>$attr,
            'bidang_id'=>2
          ]);
        }
      }
      $req = new DataOlahragaRequest();
      foreach ($req->attributes() as $key=>$attr){
        if($key !== 'year'){
          InputDataMapping::query()->create([
            'field'=>$key,
            'label'=>$attr,
            'bidang_id'=>3
          ]);
        }
      }
    }
}
