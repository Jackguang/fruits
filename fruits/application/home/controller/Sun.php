<?php
namespace app\home\controller;
use think\Controller;
use think\Db;
use think\Session;



class Sun extends Controller
{
    //开心一刻
    public function index()
    {
        $data=Db::table('sun')
            ->select();
        $this->assign('data',$data);

        return view('index');
    }
    //水果秘籍
    public function show()
    {
        $data=Db::table('sg_cheats')
            ->select();
        $this->assign('data',$data);

        return view('show');
    }
}