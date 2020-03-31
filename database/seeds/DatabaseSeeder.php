<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        $this->call(ArticulosTableSeeder::class);
        $this->call(ClientesTableSeeder::class);
        // $this->call(ProveedorTableSeeder::class);
        $this->call(DepartamentoTableSeeder::class);
        $this->call(MunicipioTableSeeder::class);
        $this->call(UserTableSeeder::class);
         

    }
}
