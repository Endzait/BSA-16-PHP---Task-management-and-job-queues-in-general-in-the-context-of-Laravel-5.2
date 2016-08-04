<?php
/**
 * Created by PhpStorm.
 * User: Endezit
 * Date: 12.07.2016
 * Time: 12:41
 */
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class BooksTableSeeder extends Seeder {

    public function run()
    {
        for ($i=0;$i<30;$i++) {
            DB::table('books')->insert([
                'title' => substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10),
                'author' => substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10),
                'year' => random_int(1800, 2016),
                'genre' => substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10),

            ]);
        }


    }

}