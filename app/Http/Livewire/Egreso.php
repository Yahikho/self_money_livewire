<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Egreso as ModelsEgreso;
use App\Models\TipoEgreso;
use Illuminate\Support\Facades\DB;

class Egreso extends Component
{

    use WithPagination;

    public $search;
    public $open_modal = false;
    public $egreso;
    public $tipoEgresos = [];

    public $fechaInicio;
    public $fechaFin;

    protected $listeners = ['render', 'delete'];

    protected $rules = [
        'egreso.valor' => 'required|min:1',
        'egreso.observaciones' => 'required',
        'egreso.id_tipo_egreso' => 'required',
        'egreso.fecha_registro' => 'required'
    ];

    public function updatingSearch(){
        $this->resetPage();
    }

    public function delete(ModelsEgreso $egreso){
        $egreso->delete();
    }

    public function edit(ModelsEgreso $egreso){
        $this->tipoEgresos = TipoEgreso::all();
        $this->egreso = $egreso;
        $this->open_modal = true;
    }

    public function upgrade(){

        $this->egreso->save();
        $this->reset('open_modal');

        $this->emitTo('egreso','render');
    }

    public function render(){

        $egresos = DB::table('egresos')
                                    ->join('tipo_egresos','egresos.id_tipo_egreso', '=', 'tipo_egresos.id')
                                    ->select('egresos.id','egresos.fecha_registro', 'egresos.observaciones','tipo_egresos.descripcion', 'egresos.valor')
                                    ->where('egresos.user_id', '=', auth()->user()->id)
                                    ->where('tipo_egresos.descripcion', 'like', '%' . $this->search . '%' )
                                    ->orWhereBetween('egresos.fecha_registro', [$this->fechaInicio, $this->fechaFin])
                                    ->orderBy('fecha_registro', 'desc')
                                    ->paginate(10);

        return view('livewire.egreso', compact('egresos'));
    }
}
