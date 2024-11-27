<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJVItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('j_v_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('account_head_id');
            $table->unsignedBigInteger('j_v_id');
            $table->foreign('j_v_id')->references('id')->on('j_v_s')->onDelete('cascade');
            $table->double('credit')->nullable();
            $table->double('debit')->nullable();
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
        Schema::dropIfExists('j_v_items');
    }
}
