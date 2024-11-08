<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Album;
use App\Models\Artist;
use App\Models\Song;
use App\Models\Certification;
use App\Models\Post;
use App\Models\Comment;
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
        $this->call(SongTableSeeder::class);
        $this->call(AlbumTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(CommentTableSeeder::class);

        Album::factory()->count(30)->create();
        Artist::factory()->count(30)->create();
        Certification::factory()->count(30)->create();
        Song::factory()->count(30)->create();
        Post::factory()->count(30)->create();
        Comment::factory()->count(30)->create();

        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
