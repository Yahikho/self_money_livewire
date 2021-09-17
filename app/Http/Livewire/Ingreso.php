<?php

namespace App\Http\Livewire;

use App\Models\Ingreso as ModelsIngreso;
use App\Models\TipoIngreso;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Ingreso extends Component
{
    use WithPagination;

    public $search;
    public $open_modal = false;
    public $ingreso;
    public $tipoIngresos = [];

    protected $listeners = ['render', 'render'];

    protected $rules = [
        'ingreso.valor' => 'required|min:1',
        'ingreso.observaciones' => 'required',
        'ingreso.id_tipo_ingreso' => 'required',
        'ingreso.fecha_registro' => 'required'
    ];

    public function updatingSearch(){
        $this->resetPage();
    }

    public function delete(ModelsIngreso $ingreso){
        $ingreso->delete();
    }

    public function edit(ModelsIngreso $ingreso){
        $this->tipoIngresos = TipoIngreso::all();
        $this->ingreso = $ingreso;
        $this->open_modal = true;
    }

    public function upgrade(){

        $this->ingreso->save();
        $this->reset('open_modal');

        $this->emit('render');
    }

    public function render()
    {
        $ingresos = DB::table('ingresos')
                                    ->join('tipo_ingresos','ingresos.id_tipo_ingreso', '=', 'tipo_ingresos.id')
                                    ->select('ingresos.id','ingresos.fecha_registro', 'ingresos.observaciones','tipo_ingresos.descripcion', 'ingresos.valor')
                                    ->where('ingresos.user_id', '=', auth()->user()->id)
                                    ->where('tipo_ingresos.descripcion', 'like', '%' . $this->search . '%' )
                                    ->orderBy('fecha_registro', 'desc')
                                    ->paginate(10);

        return view('livewire.ingreso', compact('ingresos'));
    }
}
