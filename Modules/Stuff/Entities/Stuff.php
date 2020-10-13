<?php

namespace Modules\Stuff\Entities;

use Modules\Phongban\Entities\Phongban;
use Modules\Nhanvien\Entities\Nhanvien;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Stuff extends Model
{
    use Notifiable;
    protected $table = "stuffs";

    protected $fillable = [
        'ma_ccdc','model','loai','detail','soluong','nhacungcap','baohanh','phongid','status'
    ];

    public function phongbangot(){
        return $this->belongsTo(Phongban::class,'phongid');
    }
    public function nhanvienget(){
        return $this->belongsTo(Nhanvien::class,'nv_id');
    }

}



