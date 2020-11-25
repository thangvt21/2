<?php
namespace Modules\Subject\Services;
use Modules\Subject\Entities\Phongban;

class PhongbanService
{
    public static function getAll(){
        return Phongban::all();
    }
}
