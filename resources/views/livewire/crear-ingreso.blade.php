<div class="bg-white shadow-lg text-center rounded-lg">

    <div class="my-2 flex flex-col items-center">

        <x-jet-label class="pt-2 font-bold" value="🤑 Resgitre un nuevo Ingreso 🤑" />
        <x-jet-input type="number" wire:model="valor" class="mt-2" placeholder="Digite valor ingreso" />

        <textarea class="text-area mt-2" wire:model="observacion" placeholder="Ingrese Observación"></textarea>

        <select class="text-area mt-2" name="" id="" wire:model="idTipoIngreso">

            <option value="" selected disabled>Seleccione tipo ingreso</option>

            @foreach ($tipoIngresos as $tipoIngreso)
                <option value="{{ $tipoIngreso->id }}">{{ $tipoIngreso->descripcion }}</option>
            @endforeach

        </select>

        <div class="mt-2">
            <input type="date" class="text-area" wire:model="fechaRegitro">
        </div>

        <a class="my-2 underline font-bold" href=" {{ route('tipo-ingresos') }} ">Ver tipos de Ingresos</a>

        <x-jet-input-error for="valor" />
        <x-jet-input-error for="idTipoIngreso" />
        <x-jet-input-error for="fechaRegitro" />

        <x-jet-button class="mt-2" wire:click="save()">
            Guardar
        </x-jet-button>

    </div>

</div>
