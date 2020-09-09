<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Reference;

class Phongban extends Model
{
    protected $table ='phongbans';

    protected $fillable = [
        'name','detail',
    ];
    public static function count(int $id){
        $count = DB::table('nhanviens')->where('phongban','=',$id)->groupBy('phongban')->count();
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
