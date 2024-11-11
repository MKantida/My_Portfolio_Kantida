<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    // ระบุชื่อตารางที่ถูกต้อง
    protected $table = 'tb_project';

    // ถ้าคุณมี primary key ไม่ใช่ 'id' ให้กำหนด primary key ด้วย
    protected $primaryKey = 'project_id';

    // กำหนดฟิลด์ที่สามารถกรอกได้
    protected $fillable = [
        'project', 
        'tools', 
        'link'];
}
