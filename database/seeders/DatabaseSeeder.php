<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\TaskStatus;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::factory()->create([
            'title' => 'admin'
        ]);

        Role::factory()->create([
            'title' => 'member'
        ]);

        Role::factory()->create([
            'title' => 'guest'
        ]);

        TaskStatus::factory()->create([
            'title' => 'Бэклог',
            'code' => 'backlog'
        ]);

        TaskStatus::factory()->create([
            'title' => 'В разработке',
            'code' => 'handling'
        ]);

        TaskStatus::factory()->create([
            'title' => 'Выполнено',
            'code' => 'comleted'
        ]);

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


    }
}
