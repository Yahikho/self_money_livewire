<div>
    <div class="container">
        <div class="bg-white w-full py-5 h-5 mt-5 rounded-lg shadow-lg flex items-center">
            <p class="text-gray-500 mx-auto font-bold">Ingresos</p>
        </div>
        <div class="pt-5 px-5 flex items-center ">
            <x-jet-input type="text" wire:model="search" class="flex-1" placeholder="Ingrese descripcion de Ingreso para buscar" />
        </div>
        <div class="px-5 py-3 flex items-center gap-4">
            <x-jet-label>
                Ingrese Fecha Inicio
            </x-jet-label>
            <input type="date" class="text-area" wire:model="fechaInicio">
            <x-jet-label>
                Ingrese Fecha Fin
            </x-jet-label>
            <input type="date" class="text-area" wire:model="fechaFin">
            <x-jet-button wire:click="limpiarFechas">
                Limpiar Fechas
            </x-jet-button>
        </div>
    </div>
    <x-table>
        @if (count($ingresos))
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Descripcion
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Valor
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Observaciones
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Opciones
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($ingresos as $ingreso)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $ingreso->descripcion }}</div>
                                <div class="text-sm text-gray-500">{{ $ingreso->fecha_registro }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $ingreso->valor }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $ingreso->observaciones }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">

                                {{-- @livewire('editar-ingreso', ['ingreso' => $ingreso->id]) --}}
                                <x-jet-button wire:click="edit({{ $ingreso->id }})">
                                    Editar
                                </x-jet-button>

                                <x-button-danger wire:click="$emit('destroy', {{ $ingreso->id }})" wire:loading.attr="disabled"
                                    wiere:target="destroy({{ $ingreso->id  }})">
                                    Eliminar
                                </x-button-danger>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($ingresos->hasPages())
                <div class="px-6 py-3">
                    {{ $ingresos->links() }}
                </div>
            @endif
        @else
            <div class="px-6 py-3">
                No hay registros
            </div>
        @endif
    </x-table>

    <x-jet-dialog-modal wire:model="open_modal">
        <x-slot name="title">
            Editar Ingreso
        </x-slot>
        <x-slot name="content">
            <div class="my-2 flex flex-col items-center">
                <x-jet-input wire:model="ingreso.valor" type="number" class="mt-2 w-full" />
                <textarea class="text-area mt-2 w-full" wire:model="ingreso.observaciones"
                    placeholder="Ingrese Observación"></textarea>
                <select class="text-area mt-2 w-full" name="" id="" wire:model="ingreso.id_tipo_ingreso">
                    <option value="" selected disabled>Seleccione tipo ingreso</option>
                    @foreach ($tipoIngresos as $tipoIngreso)
                        <option value="{{ $tipoIngreso->id }}">{{ $tipoIngreso->descripcion }}</option>
                    @endforeach

                </select>
                <div class="mt-2">
                    <input type="date" class="text-area" wire:model="ingreso.fecha_registro">
                </div>

            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-button wire:click="upgrade">
                Actualizar
            </x-jet-button>
            <x-jet-button wire:click="$set('open_modal', false)">
                Cancelar
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    @push('js')

        <script>
            Livewire.on('destroy', idIngreso => {
                Swal.fire({
                    title: '¿Esta segur@?',
                    text: "No puedes revertir los cambios",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.emitTo('ingreso', 'delete', idIngreso)

                        Swal.fire(
                            'Eliminado!',
                            'Ingreso eliminado.',
                            'success'
                        )
                    }
                })
            })
        </script>
    @endpush

</div>
