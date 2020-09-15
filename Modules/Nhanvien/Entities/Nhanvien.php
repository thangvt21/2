<?php

namespace Modules\Nhanvien\Entities;

use Modules\Phongban\Entities\Phongban;
use Modules\Stuff\Entities\Stuff;
use Illuminate\Database\Eloquent\Model;

class Nhanvien extends Model
{
    protected $table ='nhanviens';

    protected $fillable = [
        'phongban','name','note',
    ];

    public function phongbanget() {
        return $this->belongsTo(Phongban::class,'phongban');
    }

    public function stuff(){
        return $this->hasOne(Stuff::class);
    }
}
