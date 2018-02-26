<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/4
 * Time: 12:42
 */

namespace app\index\controller;


class HelloWorld
{
    public function index($name = 'World')
    {
        return 'Hello,' . $name . '！';
    }
}