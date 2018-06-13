<?php
/**
 * Created by PhpStorm.
 * User: echo
 * Date: 2018/3/23
 * Time: 16:04
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    #定义表名
    protected $table = "admin";
    #指定主键
    protected $primaryKey= 'admin_id';

    #定义关闭自动写入时间戳
    public $timestamps = false;

}