<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Phongban extends Model
{
    protected $table ='phongbans';

    protected $fillable = [
        'name','detail',
    ];
    public static function count(int $id){
        $count = DB::table('nhanviens')->where('nv_id','=',$id)->groupBy('nv_id')->count();
        return $count;
    }
    //
    public function nhanvien() {
        return $this->hasMany(Nhanvien::class);
    }

    public function ccdc(){
        return $this->hasMany(Stuff::class);
    }
}
