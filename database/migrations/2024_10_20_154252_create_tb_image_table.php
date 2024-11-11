<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_image', function (Blueprint $table) {
            $table->id('image_id'); // primary key
            $table->unsignedBigInteger('person_id'); // foreign key
            $table->string('image_path'); // ที่เก็บไฟล์ภาพ
            $table->timestamps(); // created_at, updated_at

            // สร้าง foreign key constraint
            $table->foreign('person_id')->references('person_id')->on('tb_personal')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_image');
    }
}
