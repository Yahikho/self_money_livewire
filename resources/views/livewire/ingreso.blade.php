<div>
    <div class="container">
        <div class="bg-white w-full py-5 h-5 mt-5 rounded-lg shadow-lg flex items-center">
            <p class="text-gray-500 mx-auto font-bold">Ingresos</p>
        </div>
        <div class="pt-5 px-5 flex items-center ">
            <x-jet-input type="text" wire:model="search" class="flex-1" placeholder="Ingrese dato de busqueda" />
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
                                <div class="flex gap-1">
                                    @livewire('editar-ingreso', ['ingreso' => $ingreso->id])
                                    <x-button-danger>
                                        Eliminar
                                    </x-button-danger>
                                </div>
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
</div>
