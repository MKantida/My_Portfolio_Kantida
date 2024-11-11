<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('sessions', function (Blueprint $table) {
            $table->string('ip_address', 45)->nullable()->after('user_id'); // เพิ่มคอลัมน์ ip_address
        });
    }

    public function down()
    {
        Schema::table('sessions', function (Blueprint $table) {
            $table->dropColumn('ip_address'); // ลบคอลัมน์ ip_address ถ้าทำ rollback
        });
    }
};
