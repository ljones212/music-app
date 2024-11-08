<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Album;
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

        Album::factory()->count(30)->create();

        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
