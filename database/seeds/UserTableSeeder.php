<?php

use Illuminate\Database\Seeder;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	
            'name_user' => 'Jefri Alexander',
            'email' => 'jama19930713@gmail.com',
            'password' => bcrypt('admin'),
           
        ]);
        User::create([
            'name_user' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            
        ]);
    }
}
