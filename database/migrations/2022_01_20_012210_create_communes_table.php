<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommunesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('communes');
        Schema::create('communes', function (Blueprint $table) {
            $table->increments('id_com')->length(11);
            $table->unsignedInteger('id_reg')->length(11);
            $table->string('description')->length(90);
            $table->enum('status', ['A', 'I', 'trash']);
        });

        Schema::table('communes', function (Blueprint $table) {
            $table->foreign('id_reg')->references('id_reg')->on('regions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('communes');
    }
}
