<?php

	namespace App\Http\Controllers;

	use App\Models\Lembaga;
  use App\Models\LevelTalenta;
  use App\Models\RefPrizes;
  use App\Models\Regencies;
  use App\Models\Talenta;
  use Illuminate\Http\JsonResponse;
  use Illuminate\Http\Request;
  use Illuminate\Support\Facades\DB;

  class CommonController extends Controller
	{
		public function index()
		{

		}

    public function storeLembaga(Request $request): JsonResponse{
      $lembaga = new Lembaga();
      $lembaga->name = $request->input('lembaga_name');
      $lembaga->level = $request->input('level');
      $lembaga->parent_id = $request->input('parent_id');
      $lembaga->address = $request->input('lembaga_address');
      $lembaga->province_id = $request->input('province_id');
      $lembaga->regency_id = $request->input('regency_id');
      $lembaga->save();
      return response()->json([
        'lembaga_id'=>$lembaga->id,
        'lembaga_name'=>$lembaga->name,
      ]);
    }

    public function storeRefPenghargaan(Request $request): JsonResponse{
      $refPrizes = new RefPrizes();
      $refPrizes->name = $request->input('modal_prize_name');
      $refPrizes->frequency = $request->input('modal_prize_freq');
      $refPrizes->bidang_id = $request->input('prize_bidang_id');
      $refPrizes->average = $request->input('modal_average');
      $refPrizes->tingkat = $request->input('modal_tingkat');
      $refPrizes->link_web = $request->input('modal_link_web');
      $refPrizes->bidang_fokus_id = $request->input('modal_bidang_fokus_id');
      $refPrizes->predefined = false;
      $refPrizes->save();
      return response()->json([
        'id'=>$refPrizes->id,
        'name'=>$refPrizes->name,
      ]);
    }

    public function storeTalenta(Request $request): JsonResponse{
      $talenta = new Talenta();
      $talenta->nama_talenta = $request->input('modal_nama_talenta');
      $talenta->nik = $request->input('modal_nik');
      $talenta->lembaga_induk_id = $request->input('t_lembaga_induk_id');
      $talenta->lembaga_unit_id = $request->input('t_lembaga_unit_id');
      $talenta->lembaga_id = $request->input('t_lembaga_id');
      $talenta->bidang_id = $request->input('modal_bidang_id');
      $talenta->level_talenta_id = $request->input('modal_level_talenta_id');
      if ($request->file('modal_foto_talenta')){
        $file = $request->file('modal_foto_talenta');
        list($realName,$ext) = explode('.',$file->getClientOriginalName());
        $fileName = $realName.'_'.time().random_int(1,99).'.'.$file->extension();
        $file->storeAs('public/talenta', $fileName);
        $talenta->foto_talenta = $fileName;
      }
      $talenta->save();
      return response()->json([
        'id'=>$talenta->id,
        'name'=>$talenta->nama_talenta,
      ]);
    }

    public function getLembagaUnit(Request $request): JsonResponse{
      $lembagaUnit = Lembaga::unit()->where('parent_id', $request->parent_id)->get();
      return response()->json([
        'data'=>$lembagaUnit,
      ]);
    }

    public function getLembagaDirektorat(Request $request): JsonResponse{
      $lembaga = Lembaga::direktorat()->where('parent_id', $request->parent_id)->get();
      return response()->json([
        'data'=>$lembaga,
      ]);
    }

    public function getRegencies(Request $request): JsonResponse{
      $regencies = Regencies::query()->where('province_id', $request->province_id)->get();
      return response()->json([
        'data'=>$regencies,
      ]);
    }

    public function getHTProvinsi(Request $request){
      $datas =  DB::table('highlight_talenta')
        ->select([
          'highlight_talenta.id',
          'highlight_talenta.tahun',
          'highlight_talenta.foto_penghargaan',
          'talenta.nama_talenta',
          'lembaga_induk.name as lembaga_induk',
          'lembaga_unit.name as lembaga_unit',
          'bidang.name as bidang',
          'ref_prizes.name as penghargaan',
        ])
        ->join('lembaga as lembaga_induk','lembaga_induk.id','=','highlight_talenta.lembaga_induk_id')
        ->join('lembaga as lembaga_unit','lembaga_unit.id','=','highlight_talenta.lembaga_unit_id')
        ->join('bidang','bidang.id','=','highlight_talenta.bidang_id')
        ->join('talenta','talenta.id','=','highlight_talenta.talenta_id')
        ->join('ref_prizes','ref_prizes.id','=','highlight_talenta.ref_prizes_id')
        ->where('lembaga_unit.province_id','=',$request->id);
      if(!empty($request->input('bidang_id'))){
        $datas = $datas->where('bidang_id',$request->input('bidang_id'));
      }
      $datas = $datas->get();
      return response()->json([
        'data'=>$datas
      ]);
    }
    public function getTalentaByCategory(Request $request): JsonResponse{
      $cat = $request->input('catId');
      $talentas = Talenta::query()->with(['bidang','lembaga_induk','lembaga_unit','lembaga'])->where('level_talenta_id', $cat)->get();
      $level = LevelTalenta::query()->with('bidang')->find($cat);
      return response()->json([
        'data'=>$talentas,
        'level'=>$level
      ]);
    }
	}
