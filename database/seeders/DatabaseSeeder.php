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
        $this->call(SongTableSeeder::class);
        $this->call(AlbumTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(CommentTableSeeder::class);
        $this->call(PostTableSeeder::class);
    }
}
