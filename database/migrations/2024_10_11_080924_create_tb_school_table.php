<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tb_school', function (Blueprint $table) {
            $table->id('school_id'); // Primary key
            $table->string('schoolname'); // ชื่อโรงเรียน
            $table->string('program'); // สายการเรียน
            $table->decimal('grade', 3, 2); // เกรดเฉลี่ย
            $table->timestamps(); // created_at และ updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_school');
    }

};
