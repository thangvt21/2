<?php
namespace Modules\Core\Services;
use Illuminate\Support\Facades\DB;
use Modules\Core\Entities\AdLogging;
use Psr\Log\NullLogger;

class AdLoggingService
{
    public static function find($id){
        return AdLogging::find($id);
    }

    public static function findJoin($id){
        $obj = AdLogging::select('ad_logging',DB::raw('ad_user.username AS `user_username`'));
        $obj = $obj->leftJoin('ad_user','ad_user.id','=','ad_logging.user_id');
        return $obj->where('ad_logging.id',$id)->first();
    }

    public static function create($data){
        $obj = new AdLogging();
        $obj->user_id = array_key_exists('user_id',$data) ? $data['user_id'] : null;
        $obj->action = array_key_exists('action',$data) ? $data['action'] : null;
        $obj->detail = array_key_exists('detail',$data) ? $data['detail'] : null;
        $obj->ip = array_key_exists('ip',$data) ? $data['ip'] : null;
        $obj->user_agent = array_key_exists('user_agent',$data) ? $data['user_agent'] : null;
        $obj->type = array_key_exists('type',$data) ? $data['type'] : null;
        $obj->save();

        return $obj->id;
    }

    public static function delete($id){
        if (is_array($id)){
            AdLogging::destroy($id);
        } else{
            $obj = AdLogging::find($id);
            if($obj){
                $obj->delete();
            }
        }
    }

    public static function getAll(){
        return AdLogging::all();
    }

    public static function getPaging ($param){
        $list = AdLogging::select('ad_logging.*',DB::raw('ad_logging.username AS `user_username`'));
        if(array_key_exists('keyword',$param)){
            $list = $list->where(function ($query) use ($param){
                $query->where('action','like','%'. $param['keyword'] .'%');
                $query->orWhere('detail','like','%'. $param['detail'] .'%');
            });
        }

        if (array_key_exists('fromDate',$param)){
            $list = $list->whereDate('created_at','>+=',$param['fromDate']);
        }
        if (array_key_exists('toDate',$param)){
            $list = $list->whereDate('created_at','<',$param['toDate']);
        }
        if(array_key_exists('userID',$param)){
            $list = $list->where('user_id',$param['userID']);
        }
        if(array_key_exists('type',$param)){
            $list = $list->where('type',$param['type']);
        }
        $list = $list->leftJoin('ad_user','ad_user.id','=','ad_logging.user_id');
        $list = $list->orderBy('ad_logging.id','desc');

        return $list->paginate(config('core.paginationLimit'));
    }
}
