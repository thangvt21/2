<?php
namespace Modules\Core\Helpers;
use http\Env\Request;
use Illuminate\Support\Facades\URL;

class Utilities
{
    public static function getUrlWithGoBack($targetUrl,$currentUrl = ''){
        if(!$currentUrl){
            $currentUrl = \Request::getRequestUri();
        }
        return self::setQueryStringToUrl($targetUrl, ['lastUrl' => $currentUrl]);
    }

    public static function getGoBackUrl($defaultUrl){
        $goBackUrl = \Request::get('lastUrl');
        return !strlen(trim($goBackUrl)) == 0 ? $goBackUrl :$defaultUrl;
    }

    public static function setQueryStringToUrl($url, array $queryString = [])
    {
        $currentQuery = [];

        $parseUrl = parse_url($url);
        $url = $parseUrl['path'];
        if(isset($parseUrl['query'])) {
            $query = $parseUrl['query'];
            $query = explode('&',$query);

        for($i = 0; $i < count($query); $i++){
            $obj = explode('=', $query[$i]);
            if(isset($obj[0]) && $obj[0]){
                $currentQuery[$obj[0]] =isset($obj[1]) ? $obj[1] : '';
            }
        }
        $queryString = array_merge(
            $currentQuery,
            $queryString
        );
        }
        return $url .'?' .http_build_query($queryString);
    }


}
