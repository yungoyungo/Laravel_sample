<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->delete();
 
        App\Comment::create([
            'article_id' => '1',
            'body' => 'neko',
        ]);
    }
}
