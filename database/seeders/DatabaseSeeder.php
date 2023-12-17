<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        \App\Models\User::factory()->create([
            'name' => 'Fadli',
            'email' => 'Fadli@gmail.com',
            'password' => bcrypt('11111111'),
            'Role' => 'admin',
            'email_verified_at' => now(),
          ]);
      
          \App\Models\User::factory()->create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => bcrypt('11111111'),
            'Role' => 'student',
            'email_verified_at' => now(),
          ]);
    }
}
