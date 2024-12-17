<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Album;
use App\Models\Song;
use App\Models\Certification;
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
        $u1 = new User;
        $u1->name = "Joe";
        $u1->email = "joej02@gmail.com";
        $u1->password = bcrypt("IHaveABadPassword");
        $u1->save();

        $u2 = new User;
        $u2->name = "Chloe";
        $u2->email = "cj09@yahoo.co.uk";
        $u2->password = bcrypt("BetUCantGuessMyPword");
        $u2->save();

        $artist = Artist::factory()->create();

        //Calls post factory.
        User::factory()
            ->count(20)
            ->has(Post::factory()
                ->count(5)
                ->state(function (array $attributes, User $user) {
                    return [
                        'postable_type' => User::class,
                        'postable_id' => $user->id,
                    ];
                })
            // Creates a number of (3) comments per post
            ->has(Comment::factory()
            ->state(function (array $attributes) {
                return [
                    'commentable_type' => User::class,
                    'commentable_id' => User::inRandomOrder()->first()->id,
                ];
            })
            ->has(Album::factory()
                ->for($artist)
                ->count(2), 'albums')
            ->has(Song::factory()
                ->count(2), 'songs')
            ->count(3), 'comments')
        // Creates albums and songs per post
        ->has(Album::factory()
            ->for($artist)
            ->count(2), 'albums')
        ->has(Song::factory()
            ->count(2), 'songs'))
    ->create();

    }
}
