<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $table = 'tb_school'; // ชื่อตารางที่เชื่อมโยง
    protected $primaryKey = 'school_id'; // Primary Key ของตาราง

    protected $fillable = [
        'schoolname',
        'program',
        'grade'
    ];

    // ฟังก์ชันเพื่อกำหนดความสัมพันธ์กับโมเดล University
    public function universities()
    {
        return $this->hasMany(University::class, 'school_id'); // school_id เป็นคอลัมน์ที่ชี้ไปที่ tb_university
    }


}
