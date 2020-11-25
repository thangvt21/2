<?php
namespace Modules\Core\Helpers;

use Illuminate\Support\Facades\URL;
use Modules\Core\Services\AdLoggingService;

class Logging
{
    public static function log($action, $detail, $type){
        $logLevel = config('core.logLevel');
        if(!in_array($type,$logLevel)){
            return;
        }

        $data = [
            'action' => $action,
            'detail' => $detail,
            'ip' => \Request::ip(),
            'user_agent' => \Request::server('HTTP_USER_AGENT'),
            'type' => $type
        ];
        if (\Auth::user()){
            $data['user_id'] = \Auth::user()->id;
        }
        AdLoggingService::create($data);
    }

    public static function LogInfo($action,$detail = null){
        self::log($action,$detail,config('core.logType')['info']);
    }

    public static function LogError($action,$detail = null){
        self::log($action,$detail,config('core.logType')['error']);
    }

    public static function Logsystem($action,$detail = null){
        self::log($action,$detail,config('core.logType')['system']);
    }
}
