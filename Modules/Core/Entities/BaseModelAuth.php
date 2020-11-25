<?php

namespace Modules\Core\Entities;

use Illuminate\Support\Facades\Auth;
use Illumonate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;

class BaseModelAuth extends User
{
    public $timestamp = false;
    protected static function boot(){
        parent::boot();
        static::creating(function ($model){
           $model->created_at = $model->freshTimestamp();
           $model->created_by = Auth::user()->id;
        });

        static::updating(function ($model){
            if(!self::checkUseSoftDelete($model) && $model->deleted_by){
                $model->updated_at = $model->freshTimestamp();
                $model->updated_by = Auth::user()->id;
            }
        });

        static::deleting(function ($model){
            if (!self::checkUseSoftDelete($model)){
                $model->deleted_at = $model->freshTimestamp();
                $model->deleted_by = Auth::user()->id;
                $model->save();
            }
        });
    }

    public static function checkUseSoftDelete($model){
        return in_array('Illuminate\Database\Eloquent\SoftDeletes', class_uses($model));
    }
}
