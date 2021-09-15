<x-app-layout>
    <div class="py-12">
        <div class="grid grid-cols-3 gap-3 container">
            <div class="bg-white shadow-lg text-center rounded-lg">
                <div class="my-2 flex flex-col items-center">
                    <x-jet-label class="pt-2 font-bold" value="🤑 Resgitre un nuevo Ingreso 🤑" />
                    <x-jet-input type="number" class="mt-2" placeholder="Digite valor ingreso" />
                    <textarea class="text-area mt-2" name="" id="" cols="20" rows="2" placeholder="Ingrese Observación">
                    </textarea>
                    <select class="text-area mt-2" name="" id="">
                        <option value="" selected disabled>Seleccione tipo ingreso</option>
                        @foreach ($data['tipoIngresos'] as $tipoIngreso)
                            <option value="{{ $tipoIngreso->id }}">{{ $tipoIngreso->descripcion }}</option>
                        @endforeach
                    </select>
<<<<<<< HEAD
                    <a class="my-2 underline font-bold" href=" {{ route('render.tipo-ingresos') }} ">Ver tipos de
                        Ingresos</a>
=======
                    <a class="my-2 underline font-bold" href=" {{ route('render.tipo-ingresos') }} ">Ver tipos de Ingresos</a>
>>>>>>> ad02cbb346a8a56b7059ceb3b2d5c5edc4a8e57d
                    <x-jet-button class="mt-2">
                        Guardar
                    </x-jet-button>
                </div>
            </div>
            <div class="bg-white shadow-lg text-center rounded-lg">
                <div class="my-2 flex flex-col items-center">
                    <x-jet-label class="pt-2 font-bold" value="😨 Resgitre un nuevo Egreso 😨" />
                    <x-jet-input type="number" class="mt-2" placeholder="Digite valor ingreso" />
                    <textarea class="text-area mt-2" name="" id="" cols="20" rows="2" placeholder="Ingrese Observación">
                    </textarea>
                    <select class="text-area mt-2" name="" id="">
                        <option value="" selected disabled>Seleccione tipo egreso</option>
                        @foreach ($data['tipoEgresos'] as $tipoEgreso)
                            <option value="{{ $tipoEgreso->id }}">{{ $tipoEgreso->descripcion }}</option>
                        @endforeach
                    </select>
                    <a class="my-2 underline font-bold" href=" {{ route('render.tipo-egresos') }} ">Ver tipos de Egresos</a>
                    <x-jet-button class="mt-2">
                        Guardar
                    </x-jet-button>
                </div>
            </div>
            <div class="bg-white shadow-lg text-center rounded-lg">
                <div class="my-2">
                    <div class="flex flex-col items-center py-10">
                        @if ($data['saldo'] < 0)
                            <p class="text-2xl font-semibold">Tu saldo es: <span class="text-red-500 font-bold">
                                    {{ $data['saldo'] }} </span></p>
                        @else
                            <p class="text-2xl font-semibold">Tu saldo es: <span class="text-green-500 font-bold">
                                    {{ $data['saldo'] }} </span></p>
                        @endif
                    </div>
                    <hr class="mt-2">
                    <div class="flex flex-col items-center">
                        <p class="font-bold py-4 text-red-500">Principales Egresos</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
