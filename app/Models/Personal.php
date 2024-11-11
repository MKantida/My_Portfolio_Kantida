<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;

class Personal extends Model
{
    use HasFactory;

    // ระบุชื่อตารางที่ถูกต้อง
    protected $table = 'tb_personal';

    // ถ้าคุณมี primary key ไม่ใช่ 'id' ให้กำหนด primary key ด้วย
    protected $primaryKey = 'person_id';
    // กำหนดฟิลด์ที่สามารถใส่ข้อมูลได้ (mass assignable)
    protected $fillable = [
        'person_id',
        'firstname',
        'lastname',
        'nickname',
        'birthday',
        'phone',
        'email',

    ];

    public function address()
    {
        return $this->hasOne(Address::class, 'person_id');
    }
    public function image()
    {
        return $this->hasOne(Image::class, 'person_id');
    }

}
