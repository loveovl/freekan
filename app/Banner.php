<?php
/**
 * Created by PhpStorm.
 * User: echo
 * Date: 2018/3/8
 * Time: 14:40
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    #定义表名
    protected $table = "banner";
    #指定主键
    protected $primaryKey= 'banner_id';
    #定义打开自动写入时间戳
    public $timestamps = true;
    #指定时间戳格式
    protected $dateFormat = 'U';
    #指定数据库中创建时间和更新时间的字段名
    const CREATED_AT = 'banner_create_time';
    const UPDATED_AT = 'banner_update_time';

}