<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    // ระบุชื่อตารางที่โมเดลนี้จะเชื่อมโยง
    protected $table = 'tb_address';

    // ถ้าชื่อ primary key ไม่ใช่ 'id' ให้กำหนดที่นี่
    protected $primaryKey = 'address_id';

    // กำหนดฟิลด์ที่สามารถใส่ข้อมูลได้ (mass assignable)
    protected $fillable = [
        'person_id',
        'number',
        'village',
        'moo',
        'soi',
        'road',
        'tambon',
        'amphoe',
        'province',
        'code',
    ];

    // ตั้งความสัมพันธ์กับโมเดล Personal
    public function personal()
    {
        return $this->belongsTo(Personal::class, 'person_id', 'person_id');
    }

}
