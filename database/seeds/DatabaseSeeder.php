<?php

use App\Feedback;
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
         //$this->call(UsersTableSeeder::class);
         $this->call(CategorySeeder::class);
         $this->call(ProduitSeeder::class);
         $this->call(ProduitImageSeeder::class);
          $this->call(OrderSeeder::class);
          $this->call(FeedbackSeeder::class);
    }
}
