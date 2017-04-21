<?php
namespace app\home\controller;
use think\Controller;
use think\Db;

class Userinfo extends Controller
{
	public function user()
	{
		$tel = '17319231328';
		$user = db('sg_user');
		$one = $user->where("u_tel = $tel")->select();
		return view('user',['one'=>$one]);
	}

	//管理收货地址
	public function address()
	{
		$uid =1;
		$uaddress = db("sg_uaddress");
		$data = $uaddress->where("u_id = $uid")->select();
		return view('addres',['data'=>$data]);
	}

	//添加收获地址
	public function goAddress()
	{
		$areas = db('sg_areas');
		$prev = $areas ->where("parent_id = 0")->select();
		return view('goaddress',['prev'=>$prev]);
	}

	public function ajaxs()
	{
		$id = $_POST['id'];
		$areas = db('sg_areas');
		$prev = $areas ->where("parent_id = $id")->select();
		echo json_encode($prev);

	}

	public function forms()
	{
		$data['u_id'] =1;
		$data['a_name'] = $_POST['names'];
		$data['a_tel'] = $_POST['tel'];
		$data['a_address'] = $_POST['ass'];
		$data['a_state']=0;
		// print_r($data);die;
		$uadd = db('sg_uaddress');
		$res = $uadd->insert($data);
		if($res){
			echo 1;
		}
	}
}