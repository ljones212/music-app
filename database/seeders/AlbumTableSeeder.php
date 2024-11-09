<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\Artist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AlbumTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $a1 = new Album;
        $a1->title = "MBDTF";
        $a1->duration = 70;
        $a1->release_date = Carbon::create(2024, 11, 8);
        $a1->artist_id = 1;
        $a1->certification_id = 2;
        $a1->save();
        $a1->songs()->attach(1);
        $a1->songs()->attach(3);

        $a2 = new Album;
        $a2->title = "DAMN.";
        $a2->duration = 65;
        $a2->release_date = Carbon::create(2003, 12, 6);
        $a2->artist_id = 2;
        $a2->certification_id = 1;
        $a2->save();
        $a2->songs()->attach(2);

        $artist = Artist::factory()->create();

        Album::factory()
            ->count(20)
            ->for($artist)
            ->create();
    }
}
