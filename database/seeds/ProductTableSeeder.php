<?php

use Illuminate\Database\Seeder;
use App\Product;
class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $book1 = new Product();
      $book1->name = "Book1";
      $book1->price = 10.5;
      $book1->user_id = 1;
      $book1->save();

      $book2 = new Product();
      $book2->name = "Book2";
      $book2->price = 8.5;
      $book2->user_id = 1;
      $book2->save();

      $book3 = new Product();
      $book3->name = "Book2";
      $book3->price = 12.8;
      $book3->user_id = 1;
      $book3->save();
    }
}
