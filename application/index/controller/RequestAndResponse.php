<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/24
 * Time: 15:12
 */

namespace app\index\controller;

use think\Controller;

class RequestAndResponse extends Controller
{
    public function requestInfo()
    {
//        return "Request Info";
//        return $this->request->controller();
//        return $this->request->module();
//        return $this->request->action();
        return 5 === "5" ? "true" : "false";
    }
}