<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbProjectTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tb_project', function (Blueprint $table) {
            $table->id('project_id'); // Primary key
            $table->string('project'); // ชื่อผลงาน
            $table->string('tools'); // เครื่องมือภาษา
            $table->string('link'); // Link
            $table->timestamps(); // created_at และ updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('tb_project');
    }
};
