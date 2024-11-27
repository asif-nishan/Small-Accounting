<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJVSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('j_v_s', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->string('ref');
            $table->string('detail')->nullable();
            $table->string('image_url')->nullable();
            $table->string('party');
            $table->string('remarks')->nullable();
            $table->double('total_debit')->default(0);
            $table->double('total_credit')->default(0);
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
        Schema::dropIfExists('j_v_s');
    }
}
