<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Role::create(["name" => "patient"]);
        // \App\Models\Role::create(["name" => "doctor"]);
        $adminRole =  \App\Models\Role::create(["name" => "admin"]);

        // \App\Models\User::factory(2)->create();
        // \App\Models\DailyData::factory(10)->create();
        // \App\Models\Meal::factory(10)->create();
        // \App\Models\Sport::factory(10)->create();
        // \App\Models\Sleeping::factory(10)->create();
        // \App\Models\Insulin::factory(10)->create();

        $admin = \App\Models\User::factory() ->create([
            'pseudo' => 'legerant4',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        $admin->roles()->attach($adminRole);
    }
}
