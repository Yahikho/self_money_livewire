<x-app-layout>
    <div class="container flex items-center mt-12">
        <div class="flex-1">
            <x-jet-input type="text" wire:model="search" class="w-full" placeholder="Ingrese dato de busqueda" />
        </div>
        <div>
            <x-jet-button class="ml-2">
                Crear nuevo Tipo Ingreso
            </x-jet-button>
        </div>
    </div>
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
                            <x-jet-button>
                                Editar
                            </x-jet-button>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <x-button-danger>
                                Eliminar
                            </x-button-danger>
                        </td>
                    </tr>
                @endforeach

                <!-- More people... -->
            </tbody>
        </table>
    </x-table>
    <x-jet-dialog-modal>
        <x-slot name="title">
            Editar colores
        </x-slot>
        <x-slot name="content">
            <x-jet-input placelholder="Ingrese nueva descripción" />
        </x-slot>
        <x-slot name="footer">  
        </x-slot>
    </x-jet-dialog-modal>
</x-app-layout>
