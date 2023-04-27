<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Animal;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Schema::disableForeignKeyConstraints();
        Animal::truncate();
        User::truncate();
        User::factory(5)->create();
        Animal::factory(10000)->create();
        Schema::enableForeignKeyConstraints();
    }
}
