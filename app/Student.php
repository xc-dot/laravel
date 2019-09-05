<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'student';//表名
    protected $pk = 's_id';//id
    public $timestamps = false;//时间
    protected $fillable = ['sname','age','headimg'];//要查询的字段

    public static function getStudent($where,$pageSize)
    {
       return self::where($where)->paginate($pageSize);
    }
}
