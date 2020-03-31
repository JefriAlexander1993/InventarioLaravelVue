 <?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Articulo::class, function (Faker $faker) {

    return [
       
        'codigo' => $faker->numberBetween(1,10000),
        'fechafabricacion' =>$faker->date($format = 'Y-m-d', $max = 'now'),
        'fechavencimiento' =>$faker->date($format = 'Y-m-d', $max = 'now'),
        'nombre' => $faker->realText($maxNbChars = 20),
        'cantidad'=> $faker->numberBetween(1,20),
        'preciounitario' => $faker->numberBetween(1,100),
        'precioventa' => $faker->numberBetween(1,100),
        'iva'=> $faker->numberBetween(1,20),
        'precioventa' => $faker->numberBetween(1,20),
        'stockmin' => $faker->numberBetween(1,20),

    ];
});


$factory->define(App\Cliente::class, function (Faker $faker) {

    return [
       
        'nuip' => $faker->numberBetween(1,1000),
        'primer_nombre' => $faker->realText($maxNbChars = 20),
        'segundo_nombre'=> $faker->realText($maxNbChars = 20),
        'primer_apellido' => $faker->realText($maxNbChars = 20),
        'segundo_apellido'=> $faker->realText($maxNbChars = 20),
        
    ];
});

