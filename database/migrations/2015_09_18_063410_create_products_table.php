<?php

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
            $table->integer('catalog_id');
            $table->string('title');
            $table->date('date_store');
            $table->integer('price');
            $table->integer('old_price');
            $table->integer('status_id');
            $table->text('description');
            $table->string('author');
            $table->string('main_image');
            $table->string('views');
            $table->string('buy_count');
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
        Schema::drop('products');
    }
}
