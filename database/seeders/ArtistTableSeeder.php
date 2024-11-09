<?php

namespace Database\Seeders;

use App\Models\Artist;
use App\Models\Album;
use App\Models\Song;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtistTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ar1 = new Artist;
        $ar1->name = "Kanye";
        $ar1->age = 54;
        $ar1->save();

        $ar2 = new Artist;
        $ar2->name = "Kendrick";
        $ar2->age = 62;
        $ar2->save();

        //Calls artist factory.
        Artist::factory()
            ->count(30)
            //Creates a number of (3) albums per artist.
            ->has(Album::factory()
                    ->has(Song::factory()->count(5), 'songs')
                    ->count(3), 'albums')
            ->create();
    }
}
