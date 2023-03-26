<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(5)
            ->create()
            ->each(function ($user) {
                Post::factory(5)
                    ->for($user, 'poster')
                    ->has(
                        Comment::factory(3)
                            ->for($user, 'poster')
                    )
                    ->create();
            });

    }
}
