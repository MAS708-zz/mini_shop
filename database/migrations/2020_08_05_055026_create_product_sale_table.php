<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_sale', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('sales_id');
            $table->unsignedBigInteger('product_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('sales_id')
            ->references('id')
            ->on('sales')
            ->onDelete('cascade');

            $table->foreign('product_id')
            ->references('id')
            ->on('products')
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
        Schema::dropIfExists('product_sale', function(Blueprint $table){

            $table->dropForeign('product_sale_product_id_foreign');
            $table->dropColumn('product_id');

            $table->dropForeign('product_sale_sales_id_foreign');
            $table->dropColumn('sales_id');

        });
    }
}
