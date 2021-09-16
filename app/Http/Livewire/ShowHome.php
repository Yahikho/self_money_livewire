<?php

namespace App\Http\Livewire;

use App\Models\Egreso;
use App\Models\Ingreso;
use App\Models\TipoEgreso;
use App\Models\TipoIngreso;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ShowHome extends Component
{

    protected $listeners = ['render' => 'render'];

    public function render()
    {
        $user = auth()->user()->id;

        $data = [ 
            'saldo'=> (Ingreso::where('user_id','=', $user)->sum('valor') - Egreso::where('user_id','=', $user )->sum('valor')),
            'tipoIngresos' => TipoIngreso::where('user_id', '=', $user)->latest()->get(),
            'tipoEgresos' => TipoEgreso::where('user_id', '=', $user)->latest()->get(),
            
            'ingresos' => DB::table('ingresos')
                                    ->join('tipo_ingresos','ingresos.id_tipo_ingreso', '=', 'tipo_ingresos.id')
                                    ->select('ingresos.fecha_registro', 'tipo_ingresos.descripcion', 'ingresos.valor')
                                    ->where('ingresos.user_id', '=', $user)
                                    ->orderBy('fecha_registro', 'desc')
                                    ->take(6)
                                    ->get(),
                                    
            'egresos' => DB::table('egresos')
                                    ->join('tipo_egresos','egresos.id_tipo_egreso', '=', 'tipo_egresos.id')
                                    ->select('egresos.fecha_registro', 'tipo_egresos.descripcion', 'egresos.valor')
                                    ->where('egresos.user_id', '=', $user)
                                    ->orderBy('fecha_registro', 'desc')
                                    ->take(6)
                                    ->get(),

         ];

        return view('livewire.show-home', compact('data'));
    }
}
