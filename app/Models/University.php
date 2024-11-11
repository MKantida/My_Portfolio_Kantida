<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;

    protected $table = 'tb_university'; // ชื่อตารางที่เชื่อมโยง
    protected $primaryKey = 'university_id'; // Primary Key ของตาราง

    protected $fillable = [
        'school_id',
        'universityname',
        'level',
        'degree',
        'faculty',
        'major',
        'gpa'
    ];

    // ตั้งความสัมพันธ์กับโมเดล School
    public function school()
    {
        return $this->belongsTo(School::class, 'school_id'); // school_id เป็นคอลัมน์ที่ชี้ไปที่ tb_school
    }

}
