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
            $table->string('article_code')->unique();
            $table->string('name');
            $table->text('description');
            $table->integer('price');
            $table->string('image_path');
            
            $table->integer('category_id')->unsigned();
            $table->integer('sale_id')->unsigned()->nullable();
            $table->integer('created_by')->unsigned();
            $table->integer('edited_by')->unsigned()->nullable();
            $table->timestamp('edited_at')->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();
            $table->integer('shop_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('sale_id')->references('id')->on('sales')->onUpdate('cascade');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('edited_by')->references('id')->on('users');
            $table->foreign('deleted_by')->references('id')->on('users');
            $table->foreign('shop_id')->references('id')->on('shops');
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
