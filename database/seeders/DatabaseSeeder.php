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
        Certification::factory()->count(30)->create();
        $this->call(ArtistTableSeeder::class);
        Artist::factory()->count(30)->create();
        $this->call(SongTableSeeder::class);
        Song::factory()->count(30)->create();
        $this->call(AlbumTableSeeder::class);
        Album::factory()->count(30)->create();
        $this->call(PostTableSeeder::class);
        Post::factory()->count(30)->create();
        $this->call(CommentTableSeeder::class);
        Comment::factory()->count(30)->create();

        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
