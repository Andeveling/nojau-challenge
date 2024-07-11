<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Tag;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Crear 10 usuarios
        $users = User::factory(10)->create();

        // Obtener todas las tags creadas
        $tags = Tag::all();

        // Asignar tags a cada usuario
        foreach ($users as $user) {
            $user->tags()->sync(
                $tags->random(rand(1, 3))->pluck('id')->toArray()
            ); // Asignar entre 1 y 3 tags aleatorias a cada usuario
        }
    }
}
