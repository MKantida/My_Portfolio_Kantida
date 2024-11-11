<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    // ระบุชื่อตารางที่โมเดลนี้จะเชื่อมโยง
    protected $table = 'tb_company';

    // ถ้าชื่อ primary key ไม่ใช่ 'id' ให้กำหนดที่นี่
    protected $primaryKey = 'company_id';

    // กำหนดฟิลด์ที่สามารถใส่ข้อมูลได้ (mass assignable)
    protected $fillable = [
        'company_id',
        'position',
        'company',
        'salary',
        'startday',
        'endday',
        'details',


    ];

}
