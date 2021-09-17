<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ingreso;

class EditarIngreso extends Component {
    public $open_modal = false;

    public $ingreso;

    protected $rules = [
        
    ];

    public function save(){
        
    }

    public function render()
    {
        $ingreso = Ingreso::where('id', '=', $this->ingreso);
        return view('livewire.editar-ingreso', compact('ingreso'));
    }
}
