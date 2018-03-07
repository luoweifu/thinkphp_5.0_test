<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/2
 * Time: 13:15
 */

namespace app\index\controller;


use think\Controller;


class BaseClass
{
    public function func()
    {
        echo "BaseClass::func()" . "<br/>";
    }
}

class SubClass extends BaseClass
{
    public function func()
    {
        echo "SubClass::func()" . "<br/>";
    }

    public function func2()
    {
        echo "SubClass::func2()" . "<br/>";
    }
}

class TestController extends Controller
{

    private function testTime()
    {
        $params = [];
        $tid = 1005;
        $param = ['tid' => $tid];
        for ($i = 0; $i < 15; $i++) {
            $btime = date('Y-m-d', strtotime("+$i day", time()));
//            echo $btime . "<br/>";
            $params["$tid:$btime"] = array_merge($param, [
                'begin_time' => $btime
            ]);
        }

        echo(json_encode($params));
    }

    public function testCallback()
    {
        //        $msg = "Hello, everyone";
//        $tFun = function ($test) use ($msg) {
//            print $test .">> This is a closure use string value, msg is: $msg. <br />";
//        };
//        $msg = "Hello, everybody";
//        $this->callback($tFun("Haha"));
    }
    private function callback($callback, $param=null) {
        $callback($param);
    }

    private function showMsg($msg)
    {
        echo $msg;
    }

    public function testYeild()
    {
//        function gen1(){
//            yield 1;
//            echo "i\n";
//            yield 2;
//            yield 3+1;
//        }
//        $gen = gen1();
//        foreach ($gen as $key => $value) {
//            echo "{$key} - {$value}\n";
//        }
    }

    public function testArray()
    {
        $arr = [1, 2, 3];
        print_r($arr);
        echo "<br/>";
        $arr2 = array("test1" => 4, "test2" => 5);
        $arr += $arr2;
        print_r($arr);
        echo "<br/>";
        print_r(array_merge($arr2, $arr));
        echo "<br/>";
    }

    public function testTimeZone()
    {
        echo date('Z') / 3600;
    }
}