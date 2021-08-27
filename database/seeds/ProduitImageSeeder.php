<?php

use App\Produit_Image;
use Illuminate\Database\Seeder;

class ProduitImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Produit_Image::class , 100)->create();
    }
}
