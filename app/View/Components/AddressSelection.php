<?php

namespace App\View\Components;

use App\Models\Province;
use App\Models\Regencies;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AddressSelection extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
      public string $provinceName,
      public string $regencyName,
      public ?int $initProvinceId = null,
      public ?int $initRegencyId = null,
      public ?string $layout = 'horizontal',
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
      $provinces = Province::all();
      $regencies = [];
      if($this->initProvinceId){
        $regencies = Regencies::query()->where('province_id',$this->initProvinceId)->get();
      }
      return view('components.address-selection', ['provinces' => $provinces, 'regencies'=> $regencies]);
    }
}
