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
    public $user;
    public $fechaActual;
    public $unaSemanaAtras;

    public function mount(){

        $this->user = auth()->user()->id;
        $this->fechaActual = date("Y-m-d");
        $this->unaSemanaAtras = date("Y-m-d", strtotime($this->fechaActual . "- 7 days"));

    }

    public function render()
    {
        $data = [
            'saldo' => (Ingreso::where('user_id', '=', $this->user)->sum('valor') - Egreso::where('user_id', '=', $this->user)->sum('valor')),
            'tipoIngresos' => TipoIngreso::where('user_id', '=', $this->user)->latest()->get(),
            'tipoEgresos' => TipoEgreso::where('user_id', '=', $this->user)->latest()->get(),

            'ingresos' => DB::table('ingresos')
                ->join('tipo_ingresos', 'ingresos.id_tipo_ingreso', '=', 'tipo_ingresos.id')
                ->select('ingresos.fecha_registro', 'tipo_ingresos.descripcion', 'ingresos.valor')
                ->where('ingresos.user_id', '=', $this->user)
                ->orderBy('fecha_registro', 'desc')
                ->take(6)
                ->get(),

            'egresos' => DB::table('egresos')
                ->join('tipo_egresos', 'egresos.id_tipo_egreso', '=', 'tipo_egresos.id')
                ->select('egresos.fecha_registro', 'tipo_egresos.descripcion', 'egresos.valor')
                ->where('egresos.user_id', '=', $this->user)
                ->orderBy('fecha_registro', 'desc')
                ->take(6)
                ->get(),
            'ingresosUltimaSemana' => $this->ingresosUltimaSemana(),
            'egresosUltimaSemana' => $this->egresosUltimaSemana(),
            'totalUltimaSemana' => $this->ingresosUltimaSemana() - $this->egresosUltimaSemana()

        ];

        return view('livewire.show-home', compact('data'));
    }

    public function ingresosUltimaSemana()
    {
        return DB::table('ingresos')
            ->whereBetween('fecha_registro', [$this->unaSemanaAtras, $this->fechaActual])
            ->where('user_id', '=', $this->user)
            ->sum('valor');
    }

    public function egresosUltimaSemana(){

        return DB::table('egresos')
        ->whereBetween('fecha_registro', [$this->unaSemanaAtras, $this->fechaActual])
        ->where('user_id', '=', $this->user)
        ->sum('valor');
    }
}
