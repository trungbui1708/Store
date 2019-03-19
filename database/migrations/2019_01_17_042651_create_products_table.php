<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('images');
            $table->integer('price');
            $table->string('discount')->nullable();
            $table->string('color');
            $table->integer('hot')->nullable();
            $table->string('thumbnail');
            $table->date('warranty');//Bảo hành
            $table->string('brand');
            $table->integer('quantity');
            $table->integer('distribution_id')->unsigned();
            $table->foreign('distribution_id')->references('id')->on('distributions')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('status')->nullable();
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
