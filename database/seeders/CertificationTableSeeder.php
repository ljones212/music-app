<?php

namespace Database\Seeders;

use App\Models\Certification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CertificationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $c1 = new Certification;
        $c1->cert_title = "Gold";
        $c1->units_sold = 500000;
        $c1->save();

        $c2 = new Certification;
        $c2->cert_title = "Platinum";
        $c2->units_sold = 1000000;
        $c2->save();
    }
}
