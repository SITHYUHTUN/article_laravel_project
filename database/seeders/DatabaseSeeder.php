<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Category;
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
        // User::factory(10)->create();

        // Article::factory()->count(20)->create();
        Article::factory(20)->create();
        Comment::factory(40)->create();
        User::factory()->create([
            "name"=>"Alice",
            "email"=>"alice@gmail.com"
        ]);
        User::factory()->create([
            "name"=>"Bob",
            "email"=>"bob@gmail.com"
        ]);
        $list=['News','Tech','Web','Moblile','UX'];
        foreach($list as $name){
            Category::create(['name'=>$name]);
        }
        
        

    }
}
