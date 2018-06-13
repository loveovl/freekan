<?php
/**
 * author 淡心心心
 * createtime 2017.3.1
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Kami extends Model
{

    #定义表名
    protected $table = "kami";
    #指定主键
    protected $primaryKey= 'km_id';
    #定义打开自动写入时间戳
    public $timestamps = true;
    #指定时间戳格式
    protected $dateFormat = 'U';
    #指定数据库中创建时间和更新时间的字段名
    const CREATED_AT = 'km_create_time';
    const UPDATED_AT = 'km_update_time';
}