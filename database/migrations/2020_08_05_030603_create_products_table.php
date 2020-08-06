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
            $table->bigIncrements('id');
            $table->string('name');
            $table->mediumText('image');
            $table->unsignedBigInteger('product_category_id');
            $table->text('desc');
            $table->string('price');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('product_category_id')
            ->references('id')
            ->on('product_categories')
            ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products', function(Blueprint $table){

            $table->dropForeign('products_product_category_id_foreign');
            $table->dropColumn('product_category_id');

        });
    }
}
