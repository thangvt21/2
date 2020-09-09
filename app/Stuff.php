<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stuff extends Model
{
    protected $table = "stuffs";

    protected $fillable = [
        'ma_ccdc','model','loai','detail'
    ];

    public function phongbangot(){
        return $this->belongsTo(Phongban::class,'phongid');
    }
}
