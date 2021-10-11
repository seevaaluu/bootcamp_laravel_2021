<?php

use Illuminate\Database\Seeder;

use App\Libro;

class LibrosTableSeeder extends Seeder
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
            Libro::create([
                "nombre" => $faker->name,
                "autor" =>  $faker->firstNameFemale,
                "editorial" => $faker->company,
                "fecha_de_publicacion" => $faker->date($format = 'Y-m-d', $max = 'now')
            ]);
        }
    }
}
