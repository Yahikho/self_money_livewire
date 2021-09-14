<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TipoEgreso;

class CrearTipoEgreso extends Component
{

    public $open_modal_create = false;
    public $descripcion;

    protected $rules = [
        'descripcion' => 'required|unique:tipo_egresos'
    ];

    public function save(){
        $this->validate();
        TipoEgreso::create([
            'descripcion' => $this->descripcion,
            'user_id' => auth()->user()->id
        ]);

        $this->reset(['descripcion', 'open_modal_create']);

        $this->emitTo('tipo-egreso', 'render');
    }

    public function render()
    {
        return view('livewire.crear-tipo-egreso');
    }
}
