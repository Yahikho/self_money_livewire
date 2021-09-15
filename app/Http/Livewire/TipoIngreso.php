<?php

namespace App\Http\Livewire;

use App\Models\TipoIngreso as ModelsTipoIngreso;
use Livewire\Component;

class TipoIngreso extends Component
{

    public $search = "reiciend";

    public function show()
    {

        $tipoIngresos = ModelsTipoIngreso::where('descripcion', 'like', "%" .$this->search. "%")->get();

        return view('livewire.tipo-ingreso', compact('tipoIngresos'));

    }
}
