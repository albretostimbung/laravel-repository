<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::create([
            'title' => 'admin',
        ]);
        Role::create([
            'title' => 'user',
        ]);

        $users = User::factory(10)->create();

        foreach ($users as $user) {
            $roles = Role::inRandomOrder()->pluck('id');
            $user->roles()->attach($roles);
        }


    }
}
