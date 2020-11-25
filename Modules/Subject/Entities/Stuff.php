<?php

namespace Modules\Subject\Entities;

use Modules\Core\Entities\BaseModel;
use Modules\Subject\Entities\Phongban;
use Modules\Subject\Entities\Nhanvien;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Stuff extends BaseModelModel
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



