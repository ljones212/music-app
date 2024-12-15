<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Album;
use App\Models\Song;
use App\Models\Artist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Joe',
            'email' => 'joej02@gmail.com',
            'password' => bcrypt('IHaveABadPassword'),
        ]);

        User::factory()->create([
            'name' => 'Chloe',
            'email' => 'cj09@yahoo.co.uk',
            'password' => bcrypt('BetUCantGuessMyPword'),
        ]);

        $artist = Artist::factory()->create();

        //Calls post factory.
        User::factory()
            ->count(20)
            //Creates a number of (5) posts per user
            ->has(Post::factory()
                ->count(5)
                //Creates a number of (3) comments per post.
                ->has(Comment::factory()
                    //Creates a number of (2) albums per comment.
                    ->has(Album::factory()
                        ->for($artist)
                        ->count(2), 'albums')
                    ->has(Song::factory()
                        ->count(2), 'songs')
                ->count(3), 'comments')
                //Creates a number of (2) albums per post.
                ->has(Album::factory()
                    ->for($artist)
                    ->count(2), 'albums')
                //Creates a number of (2) songs per post.
                ->has(Song::factory()
                    ->count(2), 'songs'))
        ->create();
    }
}
