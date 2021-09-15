<?php

namespace App\Http\Livewire;

use App\Models\Egreso;
use Livewire\Component;

class CrearEgreso extends Component
{
    public $tipoEgresos;
    public $valor;
    public $observaciones;
    public $idTipoEgreso = '';

    protected $rules = [
        'valor' => 'required|numeric|min:1',
        'idTipoEgreso' => 'required'
    ];

    public function save(){
        $this->validate();

        Egreso::create([
            'valor' => $this->valor,
            'observaciones' => $this->observaciones,
            'id_tipo_egreso' => $this->idTipoEgreso,
            'user_id' => auth()->user()->id
        ]);

        $this->reset(['valor','observaciones', 'idTipoEgreso']);

        $this->emitTo('show-home', 'render');
    }

    public function render()
    {
        return view('livewire.crear-egreso');
    }
}
