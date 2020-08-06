<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('trx_number');
            $table->unsignedBigInteger('member_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('discount');
            $table->integer('total');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales', function(Blueprint $table){

            $table->dropForeign('sales_product_id_foreign');
            $table->dropColumn('product_id');

            $table->dropForeign('sales_member_id_foreign');
            $table->dropColumn('member_id');


        });
    }
}
