<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/26
 * Time: 11:49
 */

namespace app\index\model;
use think\Model;

class User extends Model
{
//    // birthday读取器
//    public function getBirthdayAttr($birthday)
//    {
//        return date('Y-m-d', $birthday);
//    }

//    // user_birthday读取器
//    protected function getUserBirthdayAttr($value,$data)
//    {
//        return date('Y-m-d', $data['birthday']);
//    }
//
//    // birthday修改器
//    protected function setBirthdayAttr($value)
//    {
//        return strtotime($value);
//    }

//    protected $dateFormat = 'Y/m/d';
    protected $type = [
// 设置birthday为时间戳类型（整型）
        'birthday' => 'timestamp:Y/m/d',
    ];

    // 定义自动完成的属性
    protected $insert = ['status' => 1];

    // status属性修改器
    protected function setStatusAttr($value, $data)
    {
        return '张三' == $data['nickname'] ? 1 : 2;
    }
// status属性读取器
    protected function getStatusAttr($value)
    {
        $status = [-1 => '删除', 0 => '禁用', 1 => '正常', 2 => '待审核'];
        return $status[$value];
    }

    // email查询
    protected function scopeEmail($query, $email)
    {
        $query->where('email', $email);
    }
    // status查询
    protected function scopeStatus($query, $status)
    {
        $query->where('status', $status);
    }

}