<?php

namespace App\Http\Livewire;

use App\Models\TipoIngreso as ModelsTipoIngreso;
use Livewire\Component;

class TipoIngreso extends Component
{

    public $search = "hola";

    public function show()
    {

        $tipoIngresos = ModelsTipoIngreso::all();
        return view('livewire.tipo-ingreso', compact('tipoIngresos'));

    }
}
