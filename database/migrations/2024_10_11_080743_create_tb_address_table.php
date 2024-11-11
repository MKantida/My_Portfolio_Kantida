<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tb_address', function (Blueprint $table) {
            $table->id('address_id');
            $table->unsignedBigInteger('person_id')->unique();
            $table->string('number', 50)->nullable();
            $table->string('village')->nullable();
            $table->string('moo', 50)->nullable();
            $table->string('soi', 50)->nullable();
            $table->string('road')->nullable();
            $table->string('tambon')->nullable();
            $table->string('amphoe')->nullable();
            $table->string('province')->nullable();
            $table->string('code', 10)->nullable();
            $table->timestamps();

            $table->foreign('person_id')->references('person_id')->on('tb_personal')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_address');
    }
};
