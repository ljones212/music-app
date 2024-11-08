<?php

namespace Database\Seeders;

use App\Models\Album;
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
        $a1->save();

        $a2 = new Album;
        $a2->title = "DAMN.";
        $a2->duration = 65;
        $a2->release_date = Carbon::create(2003, 12, 6);
        $a2->save();
    }
}
