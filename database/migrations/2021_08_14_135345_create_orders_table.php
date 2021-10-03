<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

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
            $table->integer('zipCode')->nullable();
            $table->string('nomComplet');
            $table->string('telephone');
            $table->text('adressPostal');
            $table->string('ville');
            // 0 => Commande Etat initial En traitement
            // 1 => Commande Confirmer
            // 2 => Commande Etat Finale Commande Livre
            // 3 => Commande Annuler
            $table->enum('status' , ['0', '1' , '2' , '3'])->default('0');
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
