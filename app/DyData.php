<?php
/**
 * Created by PhpStorm.
 * User: echo
 * Date: 2018/3/8
 * Time: 12:48
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class DyData extends Model
{
    #定义表名
    protected $table = "dydata";
    #指定主键
    protected $primaryKey= 'dy_id';
    #定义打开自动写入时间戳
    public $timestamps = true;
    #指定时间戳格式
    protected $dateFormat = 'U';
    #指定数据库中创建时间和更新时间的字段名
    const CREATED_AT = 'dy_create_time';
    const UPDATED_AT = 'dy_update_time';
}