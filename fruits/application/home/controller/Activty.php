<?php
namespace app\home\controller;
use think\Controller;
use think\Db;

class Activty extends Controller
{
	public function act_show()
	{
		$arr=Db::query("select * from sg_fruits where is_hot=1");
		$this->assign('arr',$arr);
		return view('act_show');
	}
}