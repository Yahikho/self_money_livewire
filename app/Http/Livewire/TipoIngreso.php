<?php

namespace App\Http\Livewire;

use App\Models\TipoIngreso as ModelsTipoIngreso;
use Livewire\Component;
use Livewire\WithPagination;

class TipoIngreso extends Component
{
    use WithPagination;

    public $tipoIngreso;
    public $search = "";
    public $open_modal = false;

    protected $rules = [
        'tipoIngreso.descripcion' => 'required'
    ];

    public function updatingSearch(){
        $this->resetPage();
    }

    public function edit(ModelsTipoIngreso $tipoIngreso){
        $this->tipoIngreso = $tipoIngreso;
        $this->open_modal = true;
    }

    public function update(){
        $this->validate();
        $this->tipoIngreso->save();
        $this->reset(['open_modal']);
    }

    public function delete(ModelsTipoIngreso $tipoIngreso){
        $tipoIngreso->delete();
    }

    public function render(){
        $tipoIngresos = ModelsTipoIngreso::where('descripcion', 'like', "%" . $this->search . "%" )->paginate(5);

        return view('livewire.tipo-ingreso', compact('tipoIngresos'));
    }
}
