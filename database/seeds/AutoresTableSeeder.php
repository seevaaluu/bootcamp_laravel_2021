<?php

use Illuminate\Database\Seeder;
use App\Autor;

class AutoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i=0; $i < 1000; $i++) { 
            Autor::create([
                "nombre" => $faker->name,
                "apellido_paterno" =>  $faker->firstName,
                "apellido_materno" =>  $faker->firstName,
                "numero_telefonico" =>  $faker->email,
                "correo_electronico" => $faker->phoneNumber,
            ]);
        }
    }
}
