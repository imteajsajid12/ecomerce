<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id')->constrained('products')
            ->onDeleted('cascade')
            ->onUpdate('cascade');
            $table->string('name');
            $table->string('price');
            $table->string('color');
            $table->string('quantity');
            $table->string('catagory');
            $table->string('image');
            $table->string('image2');
            $table->string('image3');
            $table->longText('detelse');
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
        Schema::dropIfExists('products');
    }
}
