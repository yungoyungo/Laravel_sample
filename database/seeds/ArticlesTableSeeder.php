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

        // ユーザーを１件取得してから、Article をそのユーザーに関連付けて作成
        $user = App\User::first();

        // factory() 関数に作成するモデルのクラス名と件数を指定して、DBにデータを作成
        factory(App\Article::class, 20)->create(
            ['user_id' => $user->id,]
        );
    }
}
