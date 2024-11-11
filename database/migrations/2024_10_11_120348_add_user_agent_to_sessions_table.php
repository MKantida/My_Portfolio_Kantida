<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('sessions', function (Blueprint $table) {
            $table->text('user_agent')->nullable()->after('ip_address'); // เพิ่มคอลัมน์ user_agent
        });
    }

    public function down()
    {
        Schema::table('sessions', function (Blueprint $table) {
            $table->dropColumn('user_agent'); // ลบคอลัมน์ user_agent ถ้าทำ rollback
        });
    }
};
