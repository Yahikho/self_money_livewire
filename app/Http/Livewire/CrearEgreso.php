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
    public $fechaRegitro;

    protected $rules = [
        'valor' => 'required|numeric|min:1',
        'idTipoEgreso' => 'required',
        'fechaRegitro' => 'required'
    ];

    public function save(){
        $this->validate();

        Egreso::create([
            'valor' => $this->valor,
            'id_tipo_egreso' => $this->idTipoEgreso,
            'fecha_registro' => $this->fechaRegitro,
            'observaciones' => $this->observaciones,
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
