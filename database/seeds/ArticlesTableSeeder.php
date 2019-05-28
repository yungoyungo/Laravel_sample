<?php // database/seeds/ArticlesTableSeeder.php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;
use App\Article;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Query Builder を使って、Articlesテーブルのレコードを全て削除
        DB::table('articles')->delete();

        // Faker を使用してダミーデータを作成
        $faker = Faker::create('en_US');

        // 10件の Article データを作成
        for($i=0; $i<10; $i++) {
            Article::create([
                'title' => $faker->sentence(),
                'body' => $faker->paragraph(),
                'published_at' => Carbon::today()
            ]);
        }
    }
}
