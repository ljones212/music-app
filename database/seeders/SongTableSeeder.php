<?php

namespace Database\Seeders;

use App\Models\Song;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SongTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $s1 = new Song;
        $s1->title = "Runaway";
        $s1->duration = 6;
        $s1->certification = "Diamond";
        $s1->save();

        $s2 = new Song;
        $s2->title = "HUMBLE.";
        $s2->duration = 4;
        $s2->certification = "Platinum";
        $s2->save();

        $s3 = new Song;
        $s3->title = "Gorgeous";
        $s3->duration = 5;
        $s3->certification = "Gold";
        $s3->save();
    }
}
