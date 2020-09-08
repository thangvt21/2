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

    public function phongban() {
        return $this->belongsTo(Phongban::class);
    }
    //
}
