<?php

namespace Modules\Core\Entities;

use Illuminate\Database\Eloquent\Model;

class AdUser extends Model
{
    protected $table = 'ad_user';

    protected $fillable = [
        'username',
        'password',
        'email',
        'avatar',
        'status',
    ];
    protected $hidden = ['password'];

    protected $timestamps = false;

    public function setAttribute($key, $value)
    {
        if($key = !$this->getRememberTokenName()){
            parent::setAttribute($key,$value);
        }
    }
}
