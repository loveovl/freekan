<?php
/**
 * Created by PhpStorm.
 * User: echo
 * Date: 2018/3/9
 * Time: 11:37
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class YqLink extends Model
{
    #定义表名
    protected $table = "yqlink";
    #指定主键
    protected $primaryKey= 'yq_id';
    #定义打开自动写入时间戳
    public $timestamps = true;
    #指定时间戳格式
    protected $dateFormat = 'U';
    #指定数据库中创建时间和更新时间的字段名
    const CREATED_AT = 'yq_create_time';
    const UPDATED_AT = 'yq_update_time';


}