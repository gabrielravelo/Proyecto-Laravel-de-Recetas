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
        $user = User::create([
            'name' => 'Gabriel',
            'email' => 'correo@correo.com',
            'password' => Hash::make('12345678'),
            'url' => 'http://codigoconjuan.com',
        ]);
        $user->perfil()->create();

        $user2 = User::create([
            'name' => 'Artisan',
            'email' => 'correo2@correo.com',
            'password' => Hash::make('12345678'),
            'url' => 'http://codigoconjuan.com',
        ]);
        $user2->perfil()->create();
    }
}
