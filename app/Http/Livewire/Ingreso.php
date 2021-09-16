<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Ingreso extends Component
{
    use WithPagination;

    public $search;
    public $open_modal = false;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $ingresos = DB::table('ingresos')
                                    ->join('tipo_ingresos','ingresos.id_tipo_ingreso', '=', 'tipo_ingresos.id')
                                    ->select('ingresos.fecha_registro', 'ingresos.observaciones','tipo_ingresos.descripcion', 'ingresos.id_tipo_ingreso', 'ingresos.valor')
                                    ->where('ingresos.user_id', '=', auth()->user()->id)
                                    ->where('tipo_ingresos.descripcion', 'like', '%' . $this->search . '%' )
                                    ->orderBy('fecha_registro', 'desc')
                                    ->paginate(10);

        return view('livewire.ingreso', compact('ingresos'));
    }

    public function save(){

    }
}
