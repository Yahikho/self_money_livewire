<div class="bg-white shadow-lg text-center rounded-lg">

    <div class="my-2 flex flex-col items-center">

        <x-jet-label class="pt-2 font-bold" value="😨 Resgitre un nuevo Egreso 😨" />

        <x-jet-input type="number" wire:model="valor" class="mt-2" placeholder="Digite valor ingreso" />

        <textarea class="text-area mt-2" wire:model="observaciones" placeholder="Ingrese Observación">
        </textarea>

        <select class="text-area mt-2" wire:model="idTipoEgreso">
            <option value="" selected disabled>Seleccione tipo egreso</option>
            @foreach ($tipoEgresos as $tipoEgreso)
                <option value="{{ $tipoEgreso->id }}">{{ $tipoEgreso->descripcion }}</option>
            @endforeach
        </select>

        <div class="mt-2">
            <input type="date" class="text-area" wire:model="fechaRegitro">
        </div>

        <a class="my-2 underline font-bold" href=" {{ route('tipo-egresos') }} ">Ver tipos de Egresos</a>

        <x-jet-input-error for="valor" />
        <x-jet-input-error for="idTipoEgreso" />
        <x-jet-input-error for="fechaRegitro" />

        <x-jet-button class="mt-2" wire:click="save()">
            Guardar
        </x-jet-button>

    </div>
</div>
