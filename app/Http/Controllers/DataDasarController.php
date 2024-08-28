<?php

	namespace App\Http\Controllers;
  use App\Constants\Common;
  use App\Http\Request\DataOlahragaRequest;
  use App\Http\Request\DataRisetRequest;
  use App\Http\Request\DataSeniBudayaRequest;
  use App\Models\Bidang;
  use App\Models\DataDasar;
  use App\Models\DataDasarInputStatus;
  use App\Models\DataDasarOr;
  use App\Models\DataDasarOrInputStatus;
  use App\Models\DataDasarSb;
  use App\Models\DataDasarSbInputStatus;
  use App\Models\DataIndikator;
  use App\Models\InputDataMapping;
  use App\Models\User;
  use App\Models\UsersInput;
  use Illuminate\Database\Eloquent\Builder;
  use Illuminate\Http\RedirectResponse;
  use Illuminate\Http\Request;
  use Illuminate\View\View;

  class DataDasarController extends Controller
	{
		public function index(): View
		{
      $bidang_id = null;
      $bidang = [
        1 => [
          'label'=>'Riset dan Inovasi',
          'data'=>[],
          'attributes'=>[],
          'userInputs'=>[],
        ],
        2 => [
          'label'=>'Seni dan Budaya',
          'data'=>[],
          'attributes'=>[],
          'userInputs'=>[],
        ],
        3 => [
          'label'=>'Olah Raga',
          'data'=>[],
          'attributes'=>[],
          'userInputs'=>[],
        ],
      ];
      if(User::isSuperAdmin()){
        $bidang[1] = [...$bidang[1],...$this->getDataDasar(1)];
        $bidang[2] = [...$bidang[2],...$this->getDataDasar(2)];
        $bidang[3] = [...$bidang[3],...$this->getDataDasar(3)];
      }else{
        $bidang_id = \Auth::user()->bidang_id;
        $bidang[$bidang_id] = [...$bidang[$bidang_id],...$this->getDataDasar($bidang_id)];
        foreach ($bidang as $k=>$v){
          if($k !== $bidang_id){
            unset($bidang[$k]);
          }
        }
      }
//      dd($bidang);
      return view('data-dasar.index',[
        'bidang' => $bidang,
        'bidang_id' => $bidang_id,
        'activeMenu'=>'data',
      ]);
		}

    private function getDataDasar(int $bidang_id){
      $dataModel = DataDasar::query();
      if($bidang_id === 2){
        $dataModel = DataDasarSb::query();
      }else if($bidang_id === 3){
        $dataModel = DataDasarOr::query();
      }
      $data = $dataModel->with(['input_status' => function($query){
        if(User::isOperator()){
          $query->where('updated_by', auth()->user()->id);
        }
        return $query;
      }])->orderBy('year','desc')->get()->collect();
      $attributes = InputDataMapping::query()->where('bidang_id',$bidang_id)->get();
      $userInputs = [];
      if(User::isOperator()){
        $userInputs = UsersInput::query()->where('user_id',auth()->user()->id)->get()->collect()->pluck('input_data_id')->all();
        $attributes = collect($attributes)->whereIn('id', $userInputs)->all();
      }else{
        $attributes = $attributes->toArray();
      }
      $data = $data->map(function ($item, int $key) use($userInputs, $attributes){
        $item->status = DataDasar::getStatus($item,$userInputs,$attributes);
        return $item;
      });
      $data->all();
      return [
        'data'=>$data,
        'attributes'=>$attributes,
        'userInputs'=>$userInputs,
      ];
    }

    public function addData(int $bidang_id): View {
      $label = 'Data Riset dan Inovasi';
      $model = new DataDasar();
      if($bidang_id === 2){
        $model = new DataDasarSb();
      }else if($bidang_id === 3){
        $model = new DataDasarOr();
      }
      $req = new DataRisetRequest();
      if($bidang_id === 2){
        $req = new DataSeniBudayaRequest();
        $label = 'Data Seni dan Budaya';
      }else if($bidang_id === 3){
        $req = new DataOlahragaRequest();
        $label = 'Data Olahraga';
      }
      $rules = $req->rules();
      $attributes = InputDataMapping::query()->where('bidang_id',$bidang_id)->get();

      if(User::isOperator()){
        $userInputs = UsersInput::query()->with('inputs')->where('user_id',auth()->user()->id)->get()->collect();
        $keys_input = $userInputs->pluck('input_data_id')->all();
        $attributes = collect($attributes)->whereIn('id', $keys_input)->values();
      }else{
        $attributes = $attributes->toArray();
      }
      return view('data-dasar.form-riset',[
        'model' => $model,
        'type' => 'add',
        'rules' => $rules,
        'attributes' => $attributes,
        'activeMenu'=>'data',
        'bidang_id' => $bidang_id,
        'label' => $label,
      ]);
    }

    public function editData(int $bidang_id, int $id): View {
      $model = null;
      $label = 'Data Riset dan Inovasi';
      if($bidang_id === 1){
        $model = DataDasar::query()->with('input_status')->find($id);
      }else if($bidang_id === 2){
        $model = DataDasarSb::query()->with('input_status')->find($id);
      }else if($bidang_id === 3){
        $model = DataDasarOr::query()->with('input_status')->find($id);
      }
      $dataInputsModel = DataDasarInputStatus::query();
      if($bidang_id === 2){
        $dataInputsModel = DataDasarSbInputStatus::query();
      }else if($bidang_id === 3){
        $dataInputsModel = DataDasarOrInputStatus::query();
      }
      $dataInputs = $dataInputsModel->with(['inputs', 'user'])
        ->where('data_dasar_id', $id)->get()
        ->collect()->groupBy('inputs.field')->toArray();
      $req = new DataRisetRequest();
      if($bidang_id === 2){
        $req = new DataSeniBudayaRequest();
        $label = 'Data Seni dan Budaya';
      }else if($bidang_id === 3){
        $req = new DataOlahragaRequest();
        $label = 'Data Olahraga';
      }
      $rules = $req->rules();
      $attributes = InputDataMapping::query()->where('bidang_id',$bidang_id)->get();
      $keys_input = [];
      if(User::isOperator()){
        $userInputs = UsersInput::query()->with('inputs')->where('user_id',auth()->user()->id)->get()->collect();
        $keys_input = $userInputs->pluck('input_data_id')->all();
        $attributes = collect($attributes)->whereIn('id', $keys_input)->values();
      }else{
        $attributes = $attributes->toArray();
      }
      $status = DataDasar::getStatus($model,$keys_input,$attributes);
      return view('data-dasar.form-riset',[
        'model' => $model,
        'type' => 'edit',
        'rules' => $rules,
        'attributes' => $attributes,
        'activeMenu'=>'data',
        'dataInputs'=>$dataInputs,
        'status'=>$status,
        'bidang_id' => $bidang_id,
        'label' => $label,
      ]);
    }

    public function store(Request $request): RedirectResponse{
      $bidang_id = (int)$request->input('bidang_id');
      $label = 'Riset dan Inovasi';
      if($bidang_id === 2){
        $label = 'Seni dan Budaya';
      }else if($bidang_id === 3){
        $label = 'Olahraga';
      }
      $year = $request->input('year');
      $id = $request->input('id');
      if($id){
        $model = DataDasar::query()->find($id);
        if($bidang_id === 2){
          $model = DataDasarSb::find($id);
        }else if($bidang_id === 3){
          $model = DataDasarOr::find($id);
        }
        $type = 'edit';
      }else{
        $model = new DataDasar();
        $checkYear = DataDasar::query()->where('year','=',$year);
        if($bidang_id === 2){
          $model = new DataDasarSb();
          $checkYear = DataDasarSb::query()->where('year','=',$year);
        }else if($bidang_id === 3){
          $model = new DataDasarOr();
          $checkYear = DataDasarOr::query()->where('year','=',$year);
        }
        $checkYear = $checkYear->first();
        if($checkYear){
          return redirect()->route('data.add-data',[$bidang_id])->with('alert-failed','Terdapat duplikasi tahun. Silahkan untuk melakukan sunting data');
        }
        $type = 'add';
      }
      $attributes = InputDataMapping::query()->where('bidang_id',$bidang_id)->get();
      $keys_input = [];
      if(User::isOperator()){
        $userInputs = UsersInput::query()->with('inputs')->where('user_id',auth()->user()->id)->get()->collect();
        $keys_input = $userInputs->pluck('input_data_id')->all();
        $attributes = collect($attributes)->whereIn('id', $keys_input)->values();
      }else{
        $attributes = $attributes->toArray();
      }
      $model->year = $request->input('year');
      foreach ($attributes as $attr){
        $model->{$attr['field']} = $request->input($attr['field']);
      }
      if($type === 'add'){
        $model->status = Common::STATUS_SUBMIT;
      }
      if((User::isPic() || User::isSuperAdmin()) && $request->input('data_input') && $type === 'edit'){
        $dataInputPost = $request->input('data_input');
        $checkInputMapping = InputDataMapping::query()
          ->where('bidang_id',$bidang_id)->get();
        $countCheckInputMapping = count($checkInputMapping);
        $valid = 0;
        $reject = 0;
        foreach ($dataInputPost as $inpId=>$inpAttr){
          $checkInputDataModel = DataDasarInputStatus::query();
          if($bidang_id === 2){
            $checkInputDataModel = DataDasarSbInputStatus::query();
          }else if($bidang_id === 3){
            $checkInputDataModel = DataDasarOrInputStatus::query();
          }
          $checkInputData = $checkInputDataModel
            ->where('data_dasar_id',$id)
            ->where('input_data_id',$inpId)
            ->first();

          $status =  $inpAttr['status'] ?? null;
          $comment =  $inpAttr['comment'] ?? null;
          if(empty($checkInputData)){
            $checkInputData = new DataDasarInputStatus();
            if($bidang_id === 2){
              $checkInputData = new DataDasarSbInputStatus();
            }else if($bidang_id === 3){
              $checkInputData = new DataDasarOrInputStatus();
            }
            $checkInputData->data_dasar_id = $id;
            $checkInputData->input_data_id = $inpId;
          }
          $checkInputData->status = $status;
          $checkInputData->comment = $comment;
          $checkInputData->save();
          if($status == 1){
            $valid++;
          }else if($status == 2){
            $reject++;
          }
        }
        if($reject > 0){
          $model->status = Common::STATUS_REJECT;
        }else if($valid > 0 && $valid === $countCheckInputMapping){
          $model->status = Common::STATUS_VALID;
        }else{
          $model->status = Common::STATUS_SUBMIT;
        }
      }
      $model->save();
      if((User::isPic() || User::isSuperAdmin() ) && $model->status === Common::STATUS_VALID){
        switch ($bidang_id){
          case 1:
            DataIndikator::calculateIndikatorRiset($model->year);
            break;
          case 2:
            DataIndikator::calculateIndikatorSeniBudaya($model->year);
            break;
          case 3:
            DataIndikator::calculateIndikatorOlahraga($model->year);
            break;
        }
      }
      if((User::isOperator()) && $type === 'add'){
        $dataInput = [];
        foreach ($attributes as $attr){
          if($bidang_id === 1){
            $dataInput[] = new DataDasarInputStatus(['input_data_id'=>$attr['id']]);
          }else if($bidang_id === 2){
            $dataInput[] = new DataDasarSbInputStatus(['input_data_id'=>$attr['id']]);
          }else if($bidang_id === 3){
            $dataInput[] = new DataDasarOrInputStatus(['input_data_id'=>$attr['id']]);
          }

        }
        if(count($dataInput) > 0){
          $model->input_status()->saveMany($dataInput);
        }
      }else if((User::isOperator()) && $type === 'edit'){
        $checkModel = DataDasarInputStatus::query();
        if($bidang_id === 2){
          $checkModel = DataDasarSbInputStatus::query();
        }else if($bidang_id === 3){
          $checkModel = DataDasarOrInputStatus::query();
        }
        $check = $checkModel
          ->whereIn('input_data_id',$keys_input)
          ->where('data_dasar_id',$id);
        $checkData = $check->get();
//        dd($checkData->toArray());
        if(count($checkData) === 0){
          $dataInput = [];
          foreach ($attributes as $attr){
            if($bidang_id === 1){
              $dataInput[] = new DataDasarInputStatus(['input_data_id'=>$attr['id']]);
            }else if($bidang_id === 2){
              $dataInput[] = new DataDasarSbInputStatus(['input_data_id'=>$attr['id']]);
            }else if($bidang_id === 3){
              $dataInput[] = new DataDasarOrInputStatus(['input_data_id'=>$attr['id']]);
            }
          }
          if(count($dataInput) > 0){
            $model->input_status()->saveMany($dataInput);
          }
        }else{
          $check->update([
            'updated_by'=>auth()->user()->id
          ]);
          $check->where('status', 2)->update([
            'status'=>null,
          ]);
        }
      }
      return redirect()->route('data.index')->with('alert-success',($type === 'add' ? 'Tambah' : 'Sunting').' Data Dasar '.$label.' Berhasil');
    }


	}
