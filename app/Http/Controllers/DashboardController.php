<?php

namespace App\Http\Controllers;

use App\Constants\Common;
use App\Http\Request\DataOlahragaRequest;
use App\Http\Request\DataRisetRequest;
use App\Http\Request\DataSeniBudayaRequest;
use App\Models\AjangTalenta;
use App\Models\AnugrahTalenta;
use App\Models\DataDasar;
use App\Models\DataDasarInputStatus;
use App\Models\DataDasarOrInputStatus;
use App\Models\DataDasarSbInputStatus;
use App\Models\DataIndikator;
use App\Models\HighLightTalenta;
use App\Models\InputDataMapping;
use App\Models\PraktikBaik;
use App\Models\Talenta;
use App\Models\Testimoni;
use App\Models\User;
use App\Models\UsersInput;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
  //
  public function index(Request $request): View
  {
    $ajangTalenta = AjangTalenta::query();
    $anugrahTalenta = AnugrahTalenta::query();
    $highlightTalenta = HighLightTalenta::query();
    if (!User::isSuperAdmin()) {
      $ajangTalenta = $ajangTalenta->where('created_by', \Auth::user()->id);
      $anugrahTalenta = $anugrahTalenta->where('created_by', \Auth::user()->id);
      $highlightTalenta = $highlightTalenta->where('created_by', \Auth::user()->id);
    }
    $countAT = $ajangTalenta->count();
    $countANT = $anugrahTalenta->count();
    $countHT = $highlightTalenta->count();
    $countTestimoniUnValid = 0;
    $countTestimoniValid = 0;
    $countPraktikBaik = 0;
    $countTalenta = 0;
    $bidang_id = null;
    $bidang = [
      1 => [
        'label' => 'Riset dan Inovasi',
        'rules' => [],
        'attributes' => [],
        'dataInputs' => [],
      ],
      2 => [
        'label' => 'Seni dan Budaya',
        'rules' => [],
        'attributes' => [],
        'dataInputs' => [],
      ],
      3 => [
        'label' => 'Olah Raga',
        'rules' => [],
        'attributes' => [],
        'dataInputs' => [],
      ],
    ];

    if (User::isSuperAdmin()) {
      $bidang[1] = [...$bidang[1], ...$this->getDataInput(1)];
      $bidang[2] = [...$bidang[2], ...$this->getDataInput(2)];
      $bidang[3] = [...$bidang[3], ...$this->getDataInput(3)];
      $countTestimoniValid = Testimoni::valid()->count();
      $countTestimoniUnValid = Testimoni::unValid()->count();
      $countPraktikBaik = PraktikBaik::query()->count();
      $countTalenta = Talenta::query()->count();
    } else {
      $bidang_id = \Auth::user()->bidang_id;
      $bidang[$bidang_id] = [...$bidang[$bidang_id], ...$this->getDataInput($bidang_id)];
      foreach ($bidang as $k => $v) {
        if ($k !== $bidang_id) {
          unset($bidang[$k]);
        }
      }
    }
    $yearIndex = $request->input('year_group', 0);
    $activeYearGroup = Common::getTahun()[$yearIndex];
    return view('dashboard.index', [
      'activeMenu' => 'dashboard',
      'countAT' => $countAT,
      'countANT' => $countANT,
      'countHT' => $countHT,
      'bidang' => $bidang,
      'bidang_id' => $bidang_id,
      'countPraktikBaik' => $countPraktikBaik,
      'countTestimoniUnValid' => $countTestimoniUnValid,
      'countTestimoniValid' => $countTestimoniValid,
      'countTalenta' => $countTalenta,
      'activeYearGroup' => $activeYearGroup,
      'yearIndex' => $yearIndex
    ]);
  }

  private function getDataInput(int $bidang_id)
  {
    $dataInputs = DataDasarInputStatus::query();
    if ($bidang_id === Common::BIDANG_SENI_ID) {
      $dataInputs = DataDasarSbInputStatus::query();
    } else if ($bidang_id === Common::BIDANG_OR_ID) {
      $dataInputs = DataDasarOrInputStatus::query();
    }
    $dataInputs = $dataInputs->with(['inputs', 'user', 'data_dasar'])->get()
      ->collect()->groupBy('data_dasar.year')->toArray();
    $dataInputs = collect($dataInputs)->map(function ($item, int $key) {
      $data = collect($item)->groupBy('inputs.field')->toArray();
      return $data;
    })->toArray();
    $req = new DataRisetRequest();
    if ($bidang_id === Common::BIDANG_SENI_ID) {
      $req = new DataSeniBudayaRequest();
    } else if ($bidang_id === Common::BIDANG_OR_ID) {
      $req = new DataOlahragaRequest();
    }
    $rules = $req->rules();
    $attributes = InputDataMapping::query()->with('users')->where('bidang_id', $bidang_id)->get();
    if (User::isOperator()) {
      $userInputs = UsersInput::query()->with('inputs')->where('user_id', auth()->user()->id)->get()->collect();
      $keys_input = $userInputs->pluck('input_data_id')->all();
      $attributes = collect($attributes)->whereIn('id', $keys_input)->values();
    } else {
      $attributes = $attributes->toArray();
    }
    return [
      'rules' => $rules,
      'attributes' => $attributes,
      'dataInputs' => $dataInputs,
    ];
  }
}
