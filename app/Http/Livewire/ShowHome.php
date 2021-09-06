<?php

namespace App\Http\Livewire;

use App\Models\TipoEgreso;
use App\Models\TipoIngreso;
use Livewire\Component;

class ShowHome extends Component
{
    public function show()
    {
        $data = [ 
            'tipoIngreso' => TipoIngreso::all(),
            'tipoEgreso' => TipoEgreso::all()
         ];

        return view('livewire.show-home', compact('data'));
    }
}
