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
            $table->id();
            $table->foreignId('product_id')->references('id')->on('products') ->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('user_id')->references('id')->on('users') ->onUpdate('cascade')->onDelete('cascade');
            $table->string('quantity');
            $table->string('size');
            $table->string('color');
            $table->string('firstname');
            $table->string('address');
            $table->string('homeaddress');
            $table->string('city');
            $table->string('postcode');
            $table->string('phone');
            $table->string('email');
            $table->string('payment');
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
