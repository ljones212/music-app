<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Artist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::factory()->create();
        $artist = Artist::factory()->create();

        $p1 = new Post;
        $p1->name = "SamK";
        $p1->title = "Best Song";
        $p1->caption = "My favourite song";
        $p1->postable()->associate($user);
        $p1->save();
        $p1->albums()->attach(1);
        $p1->songs()->attach(2);

        $p2 = new Post;
        $p2->name = "Jimmy";
        $p2->title = "This album!";
        $p2->caption = "Check it out!!";
        $p2->postable_type = Artist::class;
        $p2->postable_id = $artist->id; 
        $p2->postable()->associate($artist);
        $p2->save();
        $p2->albums()->attach(1);
        $p2->albums()->attach(2);
        $p2->songs()->attach(1);
    }
}
