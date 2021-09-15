<<<<<<< HEAD
<x-app-layout>
    <div class="container flex items-center mt-12">
        <div class="flex-1">
            <x-jet-input type="text" wire:model="search" class="w-full" placeholder="Ingrese dato de busqueda" />
        </div>
        <div>
            <x-jet-button class="ml-2">
                Crear nuevo Tipo Ingreso
            </x-jet-button>
=======
<div>
    <div class="container">
        <div class="bg-white w-full py-5 h-5 mt-5 rounded-lg shadow-lg flex items-center">
            <p class="text-gray-500 mx-auto font-bold">Tipos de ingresos</p>
        </div>
        <div class="pt-5 px-5 flex items-center ">
            <x-jet-input type="text" wire:model="search" class="flex-1" placeholder="Ingrese dato de busqueda" />
            @livewire('crear-tipo-ingreso')
>>>>>>> ad02cbb346a8a56b7059ceb3b2d5c5edc4a8e57d
        </div>
    </div>
    @if (count($tipoIngresos))
        <x-table>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Descripcion
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($tipoIngresos as $tipoIngreso)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $tipoIngreso->descripcion }}</div>
                                <div class="text-sm text-gray-500">{{ $tipoIngreso->updated_at }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <x-jet-button wire:click="edit( {{ $tipoIngreso }} )">
                                    Editar
                                </x-jet-button>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <x-button-danger wire:click="delete({{ $tipoIngreso }})" wire:loading.attr="disabled">
                                    Eliminar
                                </x-button-danger>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @if ($tipoIngresos->hasPages())
                <div class="px-6 py-3">
                    {{ $tipoIngresos->links() }}
                </div>
            @endif
        @else

            <div class="px-6 py-3">
                No hay registros que coincidan
            </div>

    @endif
    </x-table>



    <x-jet-dialog-modal wire:model="open_modal_edit">
        <x-slot name="title">
            Editar el Tipo de Ingreso
        </x-slot>
        <x-slot name="content">
            <x-jet-label class="pt-2 font-bold" value="😁 Resgitre el nuevo Tipo Ingreso 😁" />
            <x-jet-input wire:model="tipoIngreso.descripcion" type="text" class="mt-2 w-full"
                placeholder="Digite nuevo tipo ingreso" />
        </x-slot>
        <x-slot name="footer">
            <x-jet-button wire:click="update" wire:loading.attr="disabled">
                Actualizar
            </x-jet-button>
            <x-jet-button wire:click="$set('open_modal_edit', false)" wire:loading.attr="disabled">
                Cancelar
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

</div>
