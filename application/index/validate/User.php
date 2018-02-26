<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/26
 * Time: 16:50
 */


namespace app\index\validate;
use think\Validate;

class User extends Validate
{
//    // 验证规则
//    protected $rule = [
//        'nickname' => 'require|min:5|token',
//        'email' => 'require|email',
//        'birthday' => 'dateFormat:Y-m-d',
//    ];

    // 验证规则
    protected $rule = [
        'nickname' => ['require', 'min'=>5, 'token'],
        'email' => ['require', 'email'],
        'birthday' => ['dateFormat' => 'Y|m|d'],
    ];
}