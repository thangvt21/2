<?php
namespace Modules\Subject\Services;
use Modules\Subject\Entities\Nhanvien;

class NhanvienService
{
    public static function find($id){
        return Nhanvien::find($id);
    }

    public static function create($data){
        $obj = new Nhanvien();
        $obj->name = array_key_exists('name',$data) ? $data['name'] : null;
        $obj->note = array_key_exists('note',$data) ? $data['note'] : null;
        $obj->phongban = array_key_exists('phongban',$data) ? $data['phongban'] : null;
        $obj->save();

        return $obj->id;
    }

    public static function update($data){
        $obj = self::find($data['id']);
        if($obj){
            $obj->phongban = array_key_exists('phongban',$data) ? $data['phongban'] : $obj->phongban;
            $obj->name = array_key_exists('name',$data) ? $data['name'] : $obj->name;
            $obj->note = array_key_exists('note',$data) ? $data['note'] : $obj->note;
            $obj->save();
        }
    }

    public static function delete($id){
        if(is_array($id)){
            Nhanvien::destroy($id);
        }
        else{
            $obj = self::find($id);
            if($obj){
                $obj->delete();
            }
        }
    }

    public static function getAll(){
        return Nhanvien::all();
    }

    public static function getPaging ($param){
        $list = new Nhanvien();
        if (array_key_exists('keyword',$param)) {
            $list = $list->where('name', 'like', '%' . $param['keyword'] . '%');
        }
            $list = $list->orderBy('id','desc');
            return $list->paginate(config('core.paginationLimit'));
        }
    }

