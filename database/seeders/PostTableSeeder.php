<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $p1 = new Post;
        $p1->name = "SamK";
        $p1->title = "Best Song";
        $p1->caption = "My favourite song";
        $p1->save();
        $p1->albums()->attach(1);
        $p1->songs()->attach(2);

        $p2 = new Post;
        $p2->name = "Jimmy";
        $p2->title = "This album!";
        $p2->caption = "Check it out!!";
        $p2->save();
        $p2->albums()->attach(1);
        $p2->albums()->attach(2);
        $p2->songs()->attach(1);
    }
}
