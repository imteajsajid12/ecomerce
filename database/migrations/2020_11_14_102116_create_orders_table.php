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
            $table->unsignedBigInteger('product_id')->constrained('products')->onDeleted('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('user_id')->constrained('users')->onDeleted('cascade')->onUpdate('cascade');
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
