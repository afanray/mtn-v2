<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      DB::table('province')->truncate();
      Province::create( [
        'code'=>'11',
        'name'=>'ACEH'
      ] );



      Province::create( [
        'code'=>'12',
        'name'=>'SUMATERA UTARA'
      ] );



      Province::create( [
        'code'=>'13',
        'name'=>'SUMATERA BARAT'
      ] );



      Province::create( [
        'code'=>'14',
        'name'=>'RIAU'
      ] );



      Province::create( [
        'code'=>'15',
        'name'=>'JAMBI'
      ] );



      Province::create( [
        'code'=>'16',
        'name'=>'SUMATERA SELATAN'
      ] );



      Province::create( [
        'code'=>'17',
        'name'=>'BENGKULU'
      ] );



      Province::create( [
        'code'=>'18',
        'name'=>'LAMPUNG'
      ] );



      Province::create( [
        'code'=>'19',
        'name'=>'KEPULAUAN BANGKA BELITUNG'
      ] );



      Province::create( [
        'code'=>'21',
        'name'=>'KEPULAUAN RIAU'
      ] );



      Province::create( [
        'code'=>'31',
        'name'=>'DKI JAKARTA'
      ] );



      Province::create( [
        'code'=>'32',
        'name'=>'JAWA BARAT'
      ] );



      Province::create( [
        'code'=>'33',
        'name'=>'JAWA TENGAH'
      ] );



      Province::create( [
        'code'=>'34',
        'name'=>'DI YOGYAKARTA'
      ] );



      Province::create( [
        'code'=>'35',
        'name'=>'JAWA TIMUR'
      ] );



      Province::create( [
        'code'=>'36',
        'name'=>'BANTEN'
      ] );



      Province::create( [
        'code'=>'51',
        'name'=>'BALI'
      ] );



      Province::create( [
        'code'=>'52',
        'name'=>'NUSA TENGGARA BARAT'
      ] );



      Province::create( [
        'code'=>'53',
        'name'=>'NUSA TENGGARA TIMUR'
      ] );



      Province::create( [
        'code'=>'61',
        'name'=>'KALIMANTAN BARAT'
      ] );



      Province::create( [
        'code'=>'62',
        'name'=>'KALIMANTAN TENGAH'
      ] );



      Province::create( [
        'code'=>'63',
        'name'=>'KALIMANTAN SELATAN'
      ] );



      Province::create( [
        'code'=>'64',
        'name'=>'KALIMANTAN TIMUR'
      ] );



      Province::create( [
        'code'=>'65',
        'name'=>'KALIMANTAN UTARA'
      ] );



      Province::create( [
        'code'=>'71',
        'name'=>'SULAWESI UTARA'
      ] );



      Province::create( [
        'code'=>'72',
        'name'=>'SULAWESI TENGAH'
      ] );



      Province::create( [
        'code'=>'73',
        'name'=>'SULAWESI SELATAN'
      ] );



      Province::create( [
        'code'=>'74',
        'name'=>'SULAWESI TENGGARA'
      ] );



      Province::create( [
        'code'=>'75',
        'name'=>'GORONTALO'
      ] );



      Province::create( [
        'code'=>'76',
        'name'=>'SULAWESI BARAT'
      ] );



      Province::create( [
        'code'=>'81',
        'name'=>'MALUKU'
      ] );



      Province::create( [
        'code'=>'82',
        'name'=>'MALUKU UTARA'
      ] );



      Province::create( [
        'code'=>'91',
        'name'=>'PAPUA BARAT'
      ] );
      Province::create( [
        'code'=>'94',
        'name'=>'PAPUA'
      ] );
    }
}
