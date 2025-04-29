<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        for ($i = 1; $i <= 50; $i++) {
            DB::table('posts')->insert([
                'title' => 'Post Title ' . $i,
                'body' => 'This is the body of post number ' . $i,
                'user_id' => rand(1, 10),
                 'commit' => 'Commit message for post random '.$i, 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    } 
}
