<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Categoria;
use App\Models\Departamento;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(10)->create();
        $dep_id=Departamento::factory()->create([
            'departamento'=>'Recursos humanos',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Ildo Cuema',
            'email' => 'ildocuema@gmail.com',
            'email_verified_at' => now(),
            'acesso'=>'super_Admin_Cuema',
            'status'=>'1',
            'departamento_id' => $dep_id->id,
            'password' => bcrypt('password_ildo7Cuema'),
            'remember_token' => Str::random(1),
        ]);
    }
}
