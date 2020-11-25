<?php

namespace Modules\Subject\Entities;

use Modules\Core\Entities\BaseModel;
use Modules\Subject\Entities\Nhanvien;
use Modules\Subject\Entities\Stuff;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Phongban extends BaseModel
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
