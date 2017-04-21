<?php
namespace app\index\controller;
use think\Controller;

class Active extends Controller{
    public function index(){
        $this->view->engine->layout(true);
        return view('index');
    }
    public function lists(){
        $arr=db('sg_active')->select();
        $this->view->engine->layout(true);
        $this->assign('arr',$arr);
        return view('lists');
    }
    public function add(){
        $data = ['active_name' => 'active_name', 'active_starttime' => 'active_starttime', 'active_endtime' => 'active_endtime'];
        Db::table('sg_active')->insert($data);
        $this->view->engine->layout(true);
        return view('add');
    }

}