<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('member_category_id');
            $table->string('full_name');
            $table->date('dob');
            $table->string('address');
            $table->enum('gender', ['wanita', 'pria']);
            $table->string('barcode');
            $table->timestamps();
            $table->softDeletes();


            $table->foreign('member_category_id')->references('id')->on('member_categories')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members', function(Blueprint $table){

            $table->dropForeign('members_member_category_id_foreign');
            $table->dropColumn('member_category_id');

        });
    }
}
