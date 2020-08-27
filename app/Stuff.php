<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stuff extends Model
{
    protected $table = "full_item_tables";

    protected $fillable = [
        'ma_ccdc','model','loai','detail'
    ];

    public function phongban(){
        return $this->belongsTo(Phongban::class);
    }
}
