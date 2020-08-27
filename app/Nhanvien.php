<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Nhanvien extends Model
{
    protected $table ='nhanviens';

    protected $fillable = [
        'nv_id','name','note',
    ];

    public function phongban() {
        return $this->belongsTo(Phongban::class,"nv_id",'id');
    }
    //
}
