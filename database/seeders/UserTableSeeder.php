<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $u1 = new User;
        $u1->name = "Joe";
        $u1->email = "joej02@gmail.com";
        $u1->password = "IHaveABadPassword";
        $u1->save();

        $u2 = new User;
        $u2->name = "Chloe";
        $u2->email = "cj09@yahoo.co.uk";
        $u2->password = "BetUCantGuessMyPword";
        $u2->save();
    }
}
