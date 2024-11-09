<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $c1 = new Comment;
        $c1->name = "JasonD00";
        $c1->comment = "It's so amazing!";
        $c1->save();
        $c1->albums()->attach(1);
        $c1->albums()->attach(20);
        
        $c2 = new Comment;
        $c2->name = "JasonP01";
        $c2->comment = "The best!";
        $c2->save();
    }
}
