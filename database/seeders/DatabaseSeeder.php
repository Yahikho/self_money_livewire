<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create([
            'name' => 'Jhon Bermudez',
            'email' => 'jhon@yahiko.com',
            'password' => bcrypt('huaweig610')
        ]);
        \App\Models\TipoEgreso::factory(10)->create();
        \App\Models\TipoIngreso::factory(10)->create();
        \App\Models\Egreso::factory(50)->create();
        \App\Models\Ingreso::factory(50)->create();
    }
}
