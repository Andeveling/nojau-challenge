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

        // Asignar entre 0 y 4 tags a cada usuario
        foreach ($users as $user) {
            $tagsToAssign = $tags->random(rand(0, 4))->pluck('id')->toArray();
            $user->tags()->sync($tagsToAssign);
        }
    }
}
