<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/2
 * Time: 13:15
 */

namespace app\index\controller;


use think\Controller;
use think\Cache\driver\Redis;


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

    public function testTime()
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

    const ONE_DAY               = 86400;    // 1天的时间戳数值

    public function testTimeTransfer()
    {
        $strRangeDate = ["2018-3-12", "2018-4-2"];
        $strRangeTime = ["18:00", "22:30"];
        $rangeDate = [
            strtotime($strRangeDate[0]),
            strtotime($strRangeDate[1])
        ];
        var_dump($rangeDate);

        // 当天0:0:0的时间戳
        $dayStartStamp = strtotime(date("Y-m-d",time()));
        // 0:0:0 到的$strRangeTime[0]（18:00）的秒数
        $timeStampRange = [
            strtotime($strRangeTime[0]) - $dayStartStamp,
            strtotime($strRangeTime[1]) - $dayStartStamp
        ];
        var_dump($timeStampRange);

        $result = [];
        $day = $rangeDate[0];
        while($day < $rangeDate[1] + self::ONE_DAY){
            $rangeTime = [
                $day + $timeStampRange[0],
                $day + $timeStampRange[1],
            ];
            $result[] = $rangeTime;
//            $result = array_merge($result, $rangeTime);
            $day += self::ONE_DAY;
        }
        var_dump($result);
//        $neResult = [];
//        foreach ($result as $e)
//        {
//            $item = [
//                date('Y-m-d H:i:s', $e[0]),
//                date('Y-m-d H:i:s', $e[1])
//            ];
//            $neResult[] = $item;
//        }
//        var_dump($neResult);
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
        $arr3 = array("key1" => 1, "key2" => 2, "key3" => 3);
        $result = array_search(3, $arr3 );
        echo "result:" . $result . "<br/>";
        $arr3[1][] = 7;
        $arr3[1][] = 8;
        print_r($arr3);
    }

    public function testArrayToJson()
    {
        $arr1= [1, 2, 3];
//        return json_encode($arr1);
        $arr2 = ["key1"=>1, "key2"=>2, "key3"=>3];
        return json_encode($arr2);
    }

    public function testTimeZone()
    {
        echo date('Z') / 3600;
    }

    public function testRedis()
    {
        //连接本地的 Redis 服务
        $redis = new Redis();
        if($redis)
        {
            echo "Connection to server successful.";
        } else
        {
            echo "Connection to server successful.";
            exit();
        }
        $redis->set("text", "Spencer");
        echo "text:". $redis->get("name");
    }
    // local change 1
    // local change 2

    // origin change 1
}
