<div>
    <div class="container">
        <div class="bg-white w-full py-5 h-5 mt-5 rounded-lg shadow-lg flex items-center">
            <p class="text-gray-500 mx-auto font-bold">Tipos de Egresos</p>
        </div>
        <div class="pt-5 px-5 flex items-center">
            <x-jet-input type="text" wire:model="search" class="flex-1" placeholder="Ingrese dato de busqueda" />
            @livewire('crear-tipo-egreso')
        </div>
    </div>
    <x-table>
        @if (count($tipoEgresos))
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Descripcion
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Editar
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Eliminar
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($tipoEgresos as $tipoEgreso)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $tipoEgreso->descripcion }}</div>
                                <div class="text-sm text-gray-500">{{ $tipoEgreso->updated_at }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <x-jet-button wire:click="edit( {{ $tipoEgreso }} )">
                                    Editar
                                </x-jet-button>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <x-button-danger wire:click="delete({{ $tipoEgreso }})" wire:loading.attr="disabled">
                                    Eliminar
                                </x-button-danger>
                            </td>
                        </tr>
                    @endforeach

                    <!-- More people... -->
                </tbody>
            </table>
            @if ($tipoEgresos->hasPages())
                <div class="px-6 py-3">
                    {{ $tipoEgresos->links() }}
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
            Editar el Tipo de Egreso
        </x-slot>
        <x-slot name="content">
            <x-jet-label class="pt-2 font-bold" value="😨 Resgitre la nueva descripción de Tipo de Egreso 😨" />
            <x-jet-input wire:model="tipoEgreso.descripcion" type="text" class="mt-2 w-full"
                placeholder="Digite nuevo tipo egreso" />
        </x-slot>
        <x-slot name="footer">
            <x-jet-button wire:click="update" wire:loading.attr="disabled">
                Actualizar
            </x-jet-button>
            <x-jet-button wire:click="$set('open_modal', false)" wire:loading.attr="disabled">
                Cancelar
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
