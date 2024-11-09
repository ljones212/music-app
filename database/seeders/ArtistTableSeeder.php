<?php

namespace Database\Seeders;

use App\Models\Artist;
use App\Models\Album;
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

        Artist::factory()
            ->count(30)
            ->has(Album::factory()->count(3), 'albums')
            ->create();
    }
}
