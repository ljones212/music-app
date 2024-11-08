<?php

namespace Database\Seeders;

use App\Models\Post;
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
        $p1->title = "Best Song";
        $p1->caption = "My favourite song";
        $p1->save();

        $p2 = new Post;
        $p2->title = "This album!";
        $p2->caption = "Check it out!!";
        $p2->save();
    }
}
