<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    #定义表名
    protected $table = "user";
    #指定主键
    protected $primaryKey= 'user_id';
    #定义打开自动写入时间戳
    public $timestamps = true;
    #指定时间戳格式
    protected $dateFormat = 'U';
    #指定数据库中创建时间和更新时间的字段名
    const CREATED_AT = 'user_create_date';
    const UPDATED_AT = 'user_update_date';

    public function setUserPassAttribute($value)
    {
        $this->attributes['user_pass'] = md5($value);
    }

}
