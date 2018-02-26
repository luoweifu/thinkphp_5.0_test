<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/24
 * Time: 15:12
 */

namespace app\index\controller;

use think\Controller;

class RequestAndResponseController extends Controller
{
    public function requestInfo()
    {
//        return "Request Info";
//        return $this->request->controller();
//        return $this->request->module();
//        return $this->request->action();
        return 5 === "5" ? "true" : "false";
    }

    public function returnJason()
    {
        $data = ['name' => 'thinkphp', 'status' => '1'];
        return json($data);
    }

    public function redirect_test(/*$url, $params = [], $code = 302*/)
    {
        $data = ['name' => 'thinkphp', 'status' => '1'];
//        Header("Location: $url");
//        return json($data);
        return json($data, 301, ["Location" => "https://www.baidu.com/"]);
    }
}