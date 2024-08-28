<?php

namespace App\View\Components;

use App\Models\Lembaga;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LembagaSelection extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
      public string $lembagaIndukName,
      public string $lembagaUnitName,
      public string $lembagaName,
      public ?bool $withAdd = false,
      public ?string $layout = 'horizontal',
      public ?bool $withSelect2 = true,
      public ?int $initLembagaIndukId = null,
      public ?int $initLembagaUnitId = null,
      public ?int $initLembagaId = null,
      public ?bool $viewOnly = false,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
      $lembagaInduk = Lembaga::induk()->get();
      $lembagaUnit = [];
      $lembaga = [];
      if($this->initLembagaIndukId){
        $lembagaUnit = Lembaga::unit()->where('parent_id', $this->initLembagaIndukId)->get();
      }
      if($this->initLembagaUnitId){
        $lembaga = Lembaga::direktorat()->where('parent_id', $this->initLembagaUnitId)->get();
      }
      return view('components.lembaga-selection',[
        'lembagaInduk' => $lembagaInduk,
        'lembagaUnit' => $lembagaUnit,
        'lembaga' => $lembaga,
        'uid'=> $this->guidv4()
      ]);
    }
    function guidv4($data = null): string {
      // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
      $data = $data ?? random_bytes(16);
      assert(strlen($data) == 16);

      // Set version to 0100
      $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
      // Set bits 6-7 to 10
      $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

      // Output the 36 character UUID.
      return vsprintf('var_%s%s_%s_%s_%s_%s%s%s', str_split(bin2hex($data), 4));
    }
}
