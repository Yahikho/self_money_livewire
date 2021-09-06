<x-app-layout>
    <div class="py-12">
        <div class="grid grid-cols-3 gap-3 container">
            <div class="bg-white shadow-lg text-center rounded-lg">
                <div class="my-2 flex flex-col items-center">
                    <x-jet-label class="pt-2 font-bold" value="🤑 Resgitre un nuevo Ingreso 🤑" />
                    <x-jet-input type="number" class="mt-2" placeholder="Digite valor ingreso"/>
                    <textarea  class="text-area mt-2" name="" id="" cols="20" rows="2" placeholder="Ingrese Observación">
                    </textarea>
                    <select  class="text-area mt-2" name="" id="">
                        <option value="" selected disabled>Seleccione tipo ingreso</option>
                        @foreach ($data['tipoIngreso'] as $tipoIngreso)
                            <option value="{{ $tipoIngreso->id }}">{{ $tipoIngreso->descripcion }}</option>
                        @endforeach
                    </select>
                    <a class="my-2 underline font-bold" href=" {{ route('show.tipo-ingreso') }} ">Ver tipo ingresos</a>
                    <x-jet-button class="mt-2">
                        Guardar
                    </x-jet-button>
                </div>
            </div>
            <div class="bg-white shadow-lg text-center rounded-lg">
                <div class="my-2 flex flex-col items-center">
                    <x-jet-label class="pt-2 font-bold" value="😨 Resgitre un nuevo Egreso 😨" />
                    <x-jet-input type="number" class="mt-2" placeholder="Digite valor ingreso"/>
                    <textarea  class="text-area mt-2" name="" id="" cols="20" rows="2" placeholder="Ingrese Observación">
                    </textarea>
                    <select  class="text-area mt-2" name="" id="">
                        <option value="" selected disabled>Seleccione tipo egreso</option>
                        @foreach ($data['tipoEgreso'] as $tipoEgreso)
                            <option value="{{ $tipoEgreso->id }}">{{ $tipoEgreso->descripcion }}</option>
                        @endforeach
                    </select>
                    <x-jet-button class="mt-2">
                        Guardar
                    </x-jet-button>
                </div>
            </div>
            <div class="bg-white shadow-lg text-center rounded-lg">
                <div class="my-2">
                    <div class="flex flex-col items-center">
                        <x-jet-label class="pt-2 font-bold" value="😁 Resgitre un nuevo Tipo Ingreso 😁"/>
                        <x-jet-input type="text"  class="mt-2" placeholder="Digite nuevo tipo ingreso" />
                        <x-jet-button class="mt-2">
                            Guardar
                        </x-jet-button>
                    </div>
                    <hr class="mt-2">
                    <div class="flex flex-col items-center"">
                        <x-jet-label class="pt-2 font-bold" value="🤫 Resgitre un nuevo Tipo Engreso 🤫"/>
                        <x-jet-input type="text"  class="mt-2" placeholder="Digite nuevo tipo engreso" />
                        <x-jet-button class="mt-2">
                            Guardar
                        </x-jet-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
