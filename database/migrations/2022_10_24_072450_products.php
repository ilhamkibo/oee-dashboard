<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qualities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ModelId');
            $table->string('Status')->nullable();
            $table->binary('Image')->nullable();
            $table->bigInteger('value_a')->nullable();
            $table->bigInteger('value_b')->nullable();
            $table->bigInteger('value_c')->nullable();
            $table->dateTime('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quality');
    }
};
