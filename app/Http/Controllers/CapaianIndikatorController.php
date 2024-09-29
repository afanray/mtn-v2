<?php

namespace App\Http\Controllers;

use App\Constants\Common;
use App\Models\DataDasar;
use App\Models\DataIndikator;
use App\Models\HighLightTalenta;
use App\Models\TargetIndikator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CapaianIndikatorController extends Controller
{
    //
    public function index(Request $request) : View {
      $data = DataIndikator::all()->collect()->groupBy('year')->toArray();
      $targetIndikator = TargetIndikator::all()->collect();
      $targetRiset = $targetIndikator->filter(function($t){
        return $t->bidang_id == Common::BIDANG_RISET_ID;
      })->groupBy('field')->map(function($g){
        return collect($g)->groupBy('year');
      })->toArray();
      $targetSeni = $targetIndikator->filter(function($t){
        return $t->bidang_id == Common::BIDANG_SENI_ID;
      })->groupBy('field')->map(function($g){
        return collect($g)->groupBy('year');
      })->toArray();
      $targetOr = $targetIndikator->filter(function($t){
        return $t->bidang_id == Common::BIDANG_OR_ID;
      })->groupBy('field')->map(function($g){
        return collect($g)->groupBy('year');
      })->toArray();
      $yearIndex = $request->input('year_group', 0);
      $activeYearGroup = Common::getTahun()[$yearIndex];
      return view('capaian-indikator.index',[
        'activeMenu' => 'capaian-indikator',
        'data'=>$data,
        'targetRiset'=>$targetRiset,
        'targetSeni'=>$targetSeni,
        'targetOr'=>$targetOr,
        'activeYearGroup'=>$activeYearGroup,
        'yearIndex'=>$yearIndex
      ]);
    }

    public function summary(): View{
      $ringkasan = DB::select('
        select
        (select count(id) from talenta where level_talenta_id = 1) as riset_pra_bibit,
        (select count(id) from talenta where level_talenta_id = 2) as riset_bibit,
        (select count(id) from talenta where level_talenta_id = 3) as riset_potensial,
        (select count(id) from talenta where level_talenta_id = 4) as riset_unggul,
        (select count(id) from talenta where level_talenta_id = 5) as seni_pra_bibit,
        (select count(id) from talenta where level_talenta_id = 6) as seni_bibit,
        (select count(id) from talenta where level_talenta_id = 7) as seni_potensial,
        (select count(id) from talenta where level_talenta_id = 8) as seni_unggul,
        (select count(id) from talenta where level_talenta_id = 9) as or_bibit,
        (select count(id) from talenta where level_talenta_id = 10) as or_potensial,
        (select count(id) from talenta where level_talenta_id = 11) as or_unggul
      ');
      return view('capaian-indikator.new-summary',[
        'activeMenu' => 'summary',
        // 'ringkasan'=>$ringkasan[0],
      ]);
    }

    public function saveTarget(Request $request): JsonResponse{
      $target = $request->input('target');
      $saved = [];
      foreach($target as $k=>$v){
        $tItem = TargetIndikator::query()->find($k);
        if($tItem){
          $tItem->target = $v ?? null;
          $tItem->save();
          $saved[] = [
            'id'=>$tItem->id,
            'val'=>$tItem->target,
          ];
        }
      }
      return response()->json([
        'data'=>$saved
      ]);
    }
}
