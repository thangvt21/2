<?php

namespace Modules\Subject\Entities;

use Faker\Provider\Base;
use Modules\Core\Entities\BaseModel;
use Modules\Subject\Entities\Phongban;
use Modules\Subject\Entities\Stuff;
use Illuminate\Database\Eloquent\Model;
//use Spatie\Activitylog\Contracts\Activity;

class Nhanvien extends BaseModel
{
    protected $table ='nhanviens';

    protected $fillable = [
        'phongban',
        'name',
        'note',
    ];

    protected $hidden = [];

    public function phongbanget() {
        return $this->belongsTo(Phongban::class,'phongban');
    }

    public function stuff(){
        return $this->hasOne(Stuff::class);
    }
}
