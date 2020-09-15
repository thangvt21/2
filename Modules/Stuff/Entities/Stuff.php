<?php

namespace Modules\Stuff\Entities;

use Modules\Phongban\Entities\Phongban;
use Modules\Nhanvien\Entities\Nhanvien;
use Illuminate\Database\Eloquent\Model;

class Stuff extends Model
{
    protected $table = "stuffs";

    protected $fillable = [
        'ma_ccdc','model','loai','detail','soluong','nhacungcap','baohanh','phongid'
    ];

    public function phongbangot(){
        return $this->belongsTo(Phongban::class,'phongid');
    }
    public function nhanvienget(){
        return $this->belongsTo(Nhanvien::class,'nv_id');
    }
}
