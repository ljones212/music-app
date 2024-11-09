<?php

namespace Database\Seeders;

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

        $this->call(CertificationTableSeeder::class);

        $this->call(ArtistTableSeeder::class);

        //Calls artist factory.
        Artist::factory()
            ->count(30)
            //Creates a number of (3) albums per artist.
            ->has(Album::factory()
                    ->has(Song::factory()->count(5), 'songs')
                    ->count(3), 'albums')
            ->create();

        $this->call(SongTableSeeder::class);

        $this->call(AlbumTableSeeder::class);
        
        $this->call(PostTableSeeder::class);

        //Calls post factory.
        Post::factory()
            ->count(30)
            //Creates a number of (3) comments per post.
            ->has(Comment::factory()->count(3), 'comments')
            ->create();

        $this->call(CommentTableSeeder::class);

        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
