<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'tb_image';

    // ระบุว่า primary key คือ image_id
    protected $primaryKey = 'image_id';

    protected $fillable = [
        'person_id',
        'image_path',
    ];

    // ความสัมพันธ์กับโมเดล Personal
    public function personal()
    {
        return $this->belongsTo(Personal::class, 'person_id');
    }


}
