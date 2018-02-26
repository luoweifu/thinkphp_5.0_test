<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
//
return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],

    'user/index' => 'index/user/index',
    'user/create' => 'index/user/create',
    'user/add' => 'index/user/add',
    'user/addList' => 'index/user/addList',
    'user/update/:id' => 'index/user/update',
    'user/delete/:id' => 'index/user/delete',
    'user/:id' => 'index/user/read',
    'user/readByEmial' => 'index/user/readByEmial'
];

//return [
//    // 定义路由的请求类型和后缀
//    'hello/[:name]' => ['index/hello', ['method' => 'get', 'ext' => 'html']],
//];

//return [
//    '[blog]' => [
//        ':year/:month' => ['blog/archive', ['method' => 'get'], ['year' => '\d{4}', 'month' => '\d{2}']],
//        ':id'          => ['blog/get', ['method' => 'get'], ['id' => '\d+']],
//        ':name'        => ['blog/read', ['method' => 'get'], ['name' => '\w+']],
//    ],
//];