<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Artist;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::factory()->create();
        $artist = Artist::factory()->create();

        $c1 = new Comment;
        $c1->name = "JasonD00";
        $c1->comment = "It's so amazing!";
        $c1->post_id = 1;
        $c1->commentable()->associate($user); 
        $c1->save();
        $c1->albums()->attach(1);
        $c1->albums()->attach(2);
        
        $c2 = new Comment;
        $c2->name = "JasonP01";
        $c2->comment = "The best!";
        $c2->post_id = 2;
        $c2->commentable()->associate($artist);
        $c2->save();
        $c2->songs()->attach(2);
        $c2->songs()->attach(1);
    }
}
