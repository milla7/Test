<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('customers');
        Schema::create('customers', function (Blueprint $table) {
            $table->integer('dni')->length(11);
            $table->primary('dni');
            $table->string('email')->length(120);
            $table->string('name')->length(45);
            $table->string('last_name')->length(45);
            $table->string('address')->nullable()->length(255);
            $table->datetime('date_reg')->nullable()->default(null);
            $table->enum('status', ['A', 'I', 'trash']);
            $table->unsignedInteger('id_reg');   
            $table->unsignedInteger('id_com');   
        });
        Schema::table('customers', function (Blueprint $table) {
            $table->foreign('id_reg')->references('id_reg')->on('regions')->onDelete('cascade');
            $table->foreign('id_com')->references('id_com')->on('communes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
