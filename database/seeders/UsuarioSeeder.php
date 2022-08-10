<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::insert([
        //     ['name'=> 'Gabriel', 
        //     'email' => 'correo@correo.com', 
        //     'password' =>Hash::make('12345678'), 
        //     'url' => 'http://codigoconjuan.com', 
        //     'created_at' => now(),
        //     'updated_at' => now()],

        //     ['name'=> 'Artisan', 
        //     'email' => 'correo2@correo.com', 
        //     'password' =>Hash::make('12345678'), 
        //     'url' => 'https://facebook.com',
        //     'created_at' => now(),
        //     'updated_at' => now()]
        // ]);

        $user = User::create([
            'name' => 'Gabriel',
            'email' => 'correo@correo.com',
            'password' => Hash::make('12345678'),
            'url' => 'http://codigoconjuan.com',
        ]);

        $user2 = User::create([
            'name' => 'Artisan',
            'email' => 'correo2@correo.com',
            'password' => Hash::make('12345678'),
            'url' => 'http://codigoconjuan.com',
        ]);
    }
}
