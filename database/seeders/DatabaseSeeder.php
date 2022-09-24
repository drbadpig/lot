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
        // CategoryFolder
        \App\Models\CategoryFolder::factory(4)->create();
        // BackgroundImage
        \App\Models\BackgroundImage::factory(1)->create();
        // roles
        \App\Models\Role::factory(4)->create();
        // users
        \App\Models\User::factory(10)->create();
        // achievements
        \App\Models\Achievement::factory(10)->create();
        // users_achievements
        \App\Models\UsersAchievements::factory(20)->create();
        // users online log
        \App\Models\UsersOnline::factory(40)->create();
        // total visits
        \App\Models\Visit::factory(100)->create();
        // categories
        \App\Models\Category::factory(15)->create();
        // talks
        \App\Models\Talk::factory(20)->create();
        // comments
        \App\Models\Comment::factory(100)->create();
        // complaint's reasons
        \App\Models\ComplaintReason::factory(3)->create();
        // complaints
        \App\Models\Complaint::factory(7)->create();
        // news
        \App\Models\News::factory(20)->create();
    }
}
