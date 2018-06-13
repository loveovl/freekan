<?php
/**
 * Created by PhpStorm.
 * User: echo
 * Date: 2018/3/8
 * Time: 15:10
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class LiveData extends Model
{
    #定义表名
    protected $table = "zbdata";
    #指定主键
    protected $primaryKey= 'zb_id';
    #定义打开自动写入时间戳
    public $timestamps = true;
    #指定时间戳格式
    protected $dateFormat = 'U';
    #指定数据库中创建时间和更新时间的字段名
    const CREATED_AT = 'zb_create_time';
    const UPDATED_AT = 'zb_update_time';

}