<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
    //
}
