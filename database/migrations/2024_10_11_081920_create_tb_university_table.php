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
        Schema::create('tb_university', function (Blueprint $table) {
            $table->id('university_id'); // Primary key
            $table->unsignedBigInteger('school_id'); // Foreign key to tb_school
            $table->string('universityname'); // ชื่อมหาวิทยาลัย
            $table->string('level'); // ระดับการศึกษา
            $table->string('degree'); // ชื่อปริญญา
            $table->string('faculty'); // คณะ
            $table->string('major'); // สาขา
            $table->decimal('gpa', 3, 2)->nullable(); // คะแนนเฉลี่ยสะสม
            $table->timestamps(); // created_at และ updated_at

            // Foreign key constraint
            $table->foreign('school_id')->references('school_id')->on('tb_school')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_university');
    }
};
