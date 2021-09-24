<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('orderCost')->default(0);
            $table->integer('qte')->default(0);
            $table->unsignedBigInteger('produit_id');
            $table->foreign('produit_id')->references('id')->on('produits')->onDelete('cascade');
            $table->string('nomComplet');
            $table->string('telephone');
            $table->text('adressPostal');
            $table->string('ville');
            $table->string('zipCode')->nullable();
            $table->enum('status' , ['Livré','Annuler' , 'Confirmer' , 'EnTraitment'])->default('EnTraitment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
