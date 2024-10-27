<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Task;
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

        User::factory()->create([
            'full_name' => 'Никита Иванов',
            'login' => 'nick',
            'password' => bcrypt('password'),
            'about_me' => 'some body...',
            'role_id' => 2
        ]);

        User::factory()->create([
            'full_name' => 'Иван Смирнов',
            'login' => 'ivanich',
            'password' => bcrypt('password'),
            'about_me' => 'some body.ivan.',
            'role_id' => 2
        ]);

        User::factory()->create([
            'full_name' => 'Андрей Петров',
            'login' => 'andr',
            'password' => bcrypt('password'),
            'about_me' => 'some body andrew',
            'role_id' => 2
        ]);

        User::factory()->create([
            'full_name' => 'Сергей Семенов',
            'login' => 'sergo',
            'password' =>  bcrypt('password'),
            'about_me' => 'some body sergey',
            'role_id' => 2
        ]);

        User::factory()->create([
            'full_name' => 'Данила Сергеев',
            'login' => 'dany',
            'password' => bcrypt('password'),
            'about_me' => 'some body danila',
            'role_id' => 2
        ]);

        Task::factory()->create([
            'title' => 'Интеграция с Google',
            'body' => 'Какое-то описание google',
            'creator_id' => User::all()->random()->id,
            'performer_id' => User::all()->random()->id,
            'task_status_id' => 1
        ]);

        Task::factory()->create([
            'title' => 'Интеграция с Yandex',
            'body' => 'Какое-то описание yandex',
            'creator_id' => User::all()->random()->id,
            'performer_id' => User::all()->random()->id,
            'task_status_id' => 1
        ]);

        Task::factory()->create([
            'title' => 'Интеграция с Whatsapp',
            'body' => 'Какое-то описание whatsapp',
            'creator_id' => User::all()->random()->id,
            'performer_id' => User::all()->random()->id,
            'task_status_id' => 1
        ]);

        Task::factory()->create([
            'title' => 'Интеграция с Youtube',
            'body' => 'Какое-то описание youtube',
            'creator_id' => User::all()->random()->id,
            'performer_id' => User::all()->random()->id,
            'task_status_id' => 1
        ]);

        Task::factory()->create([
            'title' => 'Интеграция с instagram',
            'body' => 'Какое-то описание instagram',
            'creator_id' => User::all()->random()->id,
            'performer_id' => User::all()->random()->id,
            'task_status_id' => 1
        ]);

    }
}
