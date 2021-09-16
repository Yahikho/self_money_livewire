<?php

namespace Database\Factories;

use App\Models\Egreso;
use Illuminate\Database\Eloquent\Factories\Factory;

class EgresoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Egreso::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'valor' => $this->faker->numberBetween($min = 1000, $max = 10000),
            'id_tipo_egreso' => $this->faker->numberBetween($min = 1, $max = 10),
            'fecha_registro' => $this->faker->date(),
            'observaciones' => $this->faker->word(),
            'user_id' => 1
        ];
    }
}
