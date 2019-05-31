<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            ArticlesTableSeeder::class, // ArticlesTableSeeder の呼び出し
            // OtherTableSeeder::class, // 複数の Seeder を呼び出したい場合はここに追加
        ]);
        // $this->call(UsersTableSeeder::class);
    }
}
