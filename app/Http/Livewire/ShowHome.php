<?php

namespace App\Http\Livewire;

use App\Models\Egreso;
use App\Models\Ingreso;
use App\Models\TipoEgreso;
use App\Models\TipoIngreso;
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
            'tipoEgresos' => TipoEgreso::where('user_id', '=', $user)->latest()->get()
         ];

        return view('livewire.show-home', compact('data'));
    }
}
