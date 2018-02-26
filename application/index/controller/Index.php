<?php
namespace app\index\controller;

//class Index
//{
//    public function index()
//    {
//        return 'Hello,World！';
//    }
//}
//

//use app\index\controller\Base;
//
//class Index extends Base
//{
//    public function index($name = 'World')
//    {
//        return 'Hello,' . $name . '！';
//    }
//}


namespace app\index\controller;

use think\Controller;
use think\Db;

class Index extends Controller
{
    public function index()
    {
        return "Index function";
    }
    public function hello($name = 'word')
    {
        $this->assign('name', $name);
        return $this->fetch();
    }

    public function database()
    {
        $data = Db::name('think_data')->find();
        $this->assign('result', $data);
        return $this->fetch();
    }
}