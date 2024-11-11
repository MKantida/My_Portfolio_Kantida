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
        Schema::create('tb_personal', function (Blueprint $table) {
            $table->id('person_id'); // primary key
            $table->string('firstname');
            $table->string('lastname');
            $table->string('nickname');
            $table->date('birthday')->nullable();
            $table->string('phone', 10)->nullable();
            $table->string('email')->unique();
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_personal');
    }
};
