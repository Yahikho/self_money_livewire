<?php

namespace Database\Factories;

use App\Models\TipoEgreso;
use Illuminate\Database\Eloquent\Factories\Factory;

class TipoEgresoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TipoEgreso::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'descripcion' => $this->faker->unique()->word(),
            'user_id' => 1
        ];
    }
}
