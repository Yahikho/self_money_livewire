<div>
    <x-jet-button wire:click="$set('open_modal_create', true)">
        Crear nuevo tipo Ingreso
    </x-jet-button>

    <x-jet-dialog-modal wire:model="open_modal_create">
        <x-slot name="title">
            Registrar Tipo de Ingreso
        </x-slot>
        <x-slot name="content">
            <x-jet-label class="pt-2 font-bold" value="😁 Resgitre el nuevo Tipo Ingreso 😁" />
            <x-jet-input type="text" wire:model="descripcion" class="mt-2 w-full" placeholder="Digite tipo ingreso" />
            <x-jet-input-error for="descripcion" />
        </x-slot>
        <x-slot name="footer">
            <x-jet-button wire:click="save" wire:loading.attr="disabled">
                Guardar
            </x-jet-button>
            <x-jet-button wire:click="$set('open_modal_create', false)">
                Cancelar
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

</div>
