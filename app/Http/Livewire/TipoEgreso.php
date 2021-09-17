<?php

namespace App\Http\Livewire;

use App\Models\TipoEgreso as ModelsTipoEgreso;
use Livewire\Component;
use Livewire\WithPagination;

class TipoEgreso extends Component
{

    use WithPagination;

    public $tipoEgreso;
    public $search = '';
    public $open_modal = false;

    protected $listeners = ['render' => 'render', 'delete'];

    protected $rules = [
        'tipoEgreso.descripcion' => 'required'
    ];

    public function edit(ModelsTipoEgreso $tipoEgreso){
        $this->tipoEgreso = $tipoEgreso;
        $this->open_modal = true;
    }

    public function update(){
        $this->validate();
        $this->tipoEgreso->save();
        $this->reset(['open_modal']);
    }

    public function delete(ModelsTipoEgreso $tipoEgreso){

        $tipoEgreso->delete();
        
    }

    public function render(){
        $tipoEgresos = ModelsTipoEgreso::where('descripcion', 'like', '%' . $this->search . '%')
                                        ->where('user_id', '=' , auth()->user()->id)
                                        ->latest()
                                        ->paginate(5);
                                        
        return view('livewire.tipo-egreso', compact('tipoEgresos'));
    }

}
