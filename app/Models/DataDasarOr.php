<?php

	namespace App\Models;

	use App\Constants\Common;
  use Illuminate\Database\Eloquent\Model;
  use Illuminate\Database\Eloquent\Relations\BelongsTo;
  use Illuminate\Database\Eloquent\Relations\HasMany;
  use Illuminate\Support\Facades\Auth;

  class DataDasarOr extends Model
	{
    protected $table = 'data_dasar_or';
    protected $fillable = [
      'year',
      'jml_pelatih_cabor_olimpiade',
      'jml_pelatih_cabor_paralimpiade',
      'jml_tenaga_or_sertifikasi_int',
      'jml_atlet_dunia_olimpiade',
      'jml_atlet_dunia_paralimpiade',
      'jml_atlet_muda_dunia_olimpiade',
      'jml_atlet_muda_dunia_paralimpiade',
      'peringkat_olympic_games',
      'peringkat_paralympic_games',
      'created_by',
      'updated_by',
      'status',
    ];
    public static function boot(): void
    {
      parent::boot();

      static::creating(static function ($model) {
        $model->created_by = Auth::user()->id;
      });
      static::updating(static function ($model) {
        $model->updated_by = Auth::user()->id;
      });
    }

    public function user(): BelongsTo
    {
      return $this->belongsTo(User::class,'created_by');
    }

    public function input_status(): HasMany
    {
      return $this->hasMany(DataDasarOrInputStatus::class,'data_dasar_id');
    }

    public static function getStatusLabel(int $status): string{
      switch ($status){
        case \App\Constants\Common::STATUS_VALID :
          return User::isOperator() ? 'Data Lengkap & Valid' : 'Data Lengkap';
        case \App\Constants\Common::STATUS_REJECT :
          return User::isOperator() ? 'Perlu Revisi' : 'Data Belum Lengkap';
        case \App\Constants\Common::STATUS_NULL :
          return User::isOperator() ? 'Belum Valid' : 'Perlu Validasi';
      }
      return User::isOperator() ? 'Belum Valid' : 'Perlu Validasi';
    }
    public static function getStatusClass(int $status): string{
      switch ($status){
        case \App\Constants\Common::STATUS_VALID :
          return 'badge-success';
        case \App\Constants\Common::STATUS_REJECT :
          return 'badge-danger';
        case \App\Constants\Common::STATUS_NULL :
          return 'badge-warning';
      }
      return 'badge-primary';
    }

    /**
     * @param InputDataMapping[] $attributes
     */

    public static function getStatus(DataDasar $data, $user_input,array $attributes): int {
      if(User::isOperator()){
        $user_input = collect($user_input)->flip()->all();
        $data_input = $data->input_status;
        $reject = 0;
        $valid = 0;
        $status = Common::STATUS_SUBMIT;
        $lengthData = 0;
        foreach ($data_input as $inp){
          if(isset($user_input[$inp->input_data_id])){
            if($inp->status == 1){
              $valid++;
            }else if($inp->status == 2){
              $reject++;
            }
            $lengthData++;
          }
        }
        if($lengthData > 0){
          if($reject > 0){
            $status = Common::STATUS_REJECT;
          }else if($valid > 0 && $valid === $lengthData){
            $status = Common::STATUS_VALID;
          }
        }else{
          $status = Common::STATUS_NULL;
        }
        return $status;
      }
      $lengthData = count($attributes);
      $dataInputCol = collect($data->input_status);
      $filteredValid = $dataInputCol->filter(function ($value) {
        return $value['status'] == 1;
      })->count();
      $filteredReject = $dataInputCol->filter(function ($value) {
        return $value['status'] == 2;
      })->count();
      $filteredSubmit = $dataInputCol->filter(function ($value) {
        return $value['status'] == null;
      })->count();
      if($filteredReject > 0){
        return Common::STATUS_REJECT;
      }

      if($filteredValid > 0){
        if($filteredValid == $lengthData){
          return Common::STATUS_VALID;
        }
        return Common::STATUS_REJECT;
      }

      return Common::STATUS_SUBMIT;
    }
	}
