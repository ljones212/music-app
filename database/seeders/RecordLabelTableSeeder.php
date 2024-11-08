<?php

namespace Database\Seeders;

use App\Models\RecordLabel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RecordLabelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $r1 = new RecordLabel;
        $r1->name = "Roc-A-Fella";
        $r1->director = "Jay-Z";
        $r1->year_founded = Carbon::create(1996, 23, 6);
        $r1->save();

        $r2 = new RecordLabel;
        $r2->name = "Aftermath";
        $r2->director = "Dr. Dre";
        $r2->year_founded = Carbon::create(1993, 19, 3);
        $r2->save();
    }
}
