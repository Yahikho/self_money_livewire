<div>
    <x-jet-button wire:click="$set('open_modal', true)">
        Editar
    </x-jet-button>
    <x-jet-dialog-modal wire:model="open_modal">
        <x-slot name="title">
            Editar Ingreso
        </x-slot>
        <x-slot name="content">
            <x-jet-label class="pt-2 font-bold" value="😨 Resgitre el nuevo Tipo Egreso 😨" />
            <x-jet-input wire:model="ingreso.valor" type="text" class="mt-2 w-full" />
            {{ $ingreso }}
            <x-jet-input-error for="ingreso.valor" />
        </x-slot>
        <x-slot name="footer">
            <x-jet-button>
                Guardar
            </x-jet-button>
            <x-jet-button wire:click="$set('open_modal', false)">
                Cancelar
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
