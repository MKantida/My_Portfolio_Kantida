<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbCompanyTable extends Migration
{
    public function up()
    {
        Schema::create('tb_company', function (Blueprint $table) {
            $table->id('company_id'); // Primary key
            $table->string('company'); // ชื่อบริษัท
            $table->string('position'); // ตำแหน่ง
            $table->decimal('salary', 10, 2)->nullable(); // อัตราเงินเดือน
            $table->date('startday')->nullable(); // วันที่เริ่มงาน
            $table->date('endday')->nullable(); // วันที่ออกจากงาน
            $table->text('details')->nullable(); // รายละเอียดงาน
            $table->timestamps(); // created_at และ updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_company');
    }
};
