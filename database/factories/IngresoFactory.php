<?php

namespace Database\Factories;

use App\Models\Ingreso;
use Illuminate\Database\Eloquent\Factories\Factory;

class IngresoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ingreso::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'valor' => $this->faker->numberBetween($min = 1000, $max = 10000),
            'id_tipo_ingreso' => $this->faker->numberBetween($min = 1, $max = 10),
            'fecha_registro' => $this->faker->date(),
            'observaciones' => $this->faker->text(),
            'user_id' => 1
        ];
    }
}
