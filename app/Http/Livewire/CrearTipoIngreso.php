<?php

namespace App\Http\Livewire;

use App\Models\TipoIngreso;
use Livewire\Component;

class CrearTipoIngreso extends Component
{

    public $open_modal_create = false;
    public $descripcion;


    protected $rules = [
        'descripcion' => 'required|unique:tipo_ingresos'
    ];

    public function save(){

        $this->validate();
        TipoIngreso::create([
            'descripcion' => $this->descripcion,
            'user_id' => auth()->user()->id
        ]);

        $this->reset(['descripcion','open_modal_create']);

        $this->emitTo('tipo-ingreso', 'render');
        $this->emitTo('show-home', 'render');
    }

    public function render()
    {
        return view('livewire.crear-tipo-ingreso');
    }
}
