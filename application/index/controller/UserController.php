<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/26
 * Time: 13:13
 */

namespace app\index\controller;


use think\Controller;
use app\index\model\User;

class UserController extends Controller
{
    // 新增用户数据
    public function add()
    {
//        $user = new User;
//        $user->nickname = '流年';
//        $user->email = 'thinkphp@qq.com';
//        $user->birthday = strtotime('1977-03-05');
//        if ($user->save()) {
//            return '用户[ ' . $user->nickname . ':' . $user->id . ' ]新增成功';
//        } else {
//            return $user->getError();
//        }


//        $values['nickname'] = '看云';
//        $values['email'] = 'kancloud@qq.com';
////        $values['birthday'] = strtotime('2015-04-02');
//        $values['birthday'] = '2015-04-02';
//        if ($result = User::create($values)) {
//            return '用户[ ' . $result->nickname . ':' . $result->id . ' ]新增成功';
//        } else {
//            return '新增出错';
//        }


        $user = new User;
        if ($user->allowField(true)->validate(true)->save(input('post.'))) {
            return '用户[ ' . $user->nickname . ':' . $user->id . ' ]新增成功';
        } else {
            return $user->getError();
        }
    }


    // 批量新增用户数据
    public function addList()
    {
        $user = new User;
        $list = [
            ['nickname' => '张三', 'email' => 'zhanghsan@qq.com', 'birthday' => strtotime('1988-01-15')],
            ['nickname' => '李四', 'email' => 'lisi@qq.com', 'birthday' => strtotime('1990-09-19')],
        ];
        if ($user->saveAll($list)) {
            return '用户批量新增成功';
        } else {
            return $user->getError();
        }
    }


    // 读取用户数据
    public function read($id='')
    {
        $user = User::get($id);
        echo $user->nickname . '<br/>';
        echo $user->email . '<br/>';
        echo $user->birthday . '<br/>';
//        echo $user->user_birthday . '<br/>';
//        echo date('Y/m/d', $user->birthday) . '<br/>';
//        return json($user->toArray());
    }

    public function readByEmial($email)
    {
        $user = User::getByEmail($email);
        if($user)
        {
            return json($user->toArray());
        } else
        {
            return json("error");
        }
    }


    // 获取用户数据列表
    public function index()
    {
        $list = User::scope('email', 'kancloud@qq.com')
            ->scope('status', 0)
            ->scope(function ($query) {
                $query->order('id', 'esc');
            })
            ->all();
//        $list = User::where('id','<=',3)->select();
        if($list)
        {
            return json($list);
        } else
        {
            return json("error");
        }
    }

    // 更新用户数据
    public function update($id)
    {
        $user = User::get($id);
        $user->nickname = '刘晨';
        $user->email = 'liu21st@gmail.com';
        if (false !== $user->save()) {
            return '更新用户成功';
        } else {
            return $user->getError();
        }
    }


    // 删除用户数据
    public function delete($id)
    {
//        $user = User::get($id);
//        if ($user) {
//            $user->delete();
//            return '删除用户成功';
//        } else {
//            return '删除的用户不存在';
//        }

        $result = User::destroy($id);
        if ($result) {
            return '删除用户成功';
        } else {
            return '删除的用户不存在';
        }
    }

    // 创建用户数据页面
    public function create()
    {
        return view();
    }
}