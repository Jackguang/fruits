<?php
namespace app\home\controller;
use think\Controller;
use think\Db;
use think\Session;
class Userinfo extends Controller
{
	public function user()
	{
		$tel = Session::get('u_tel');
		// $tel = '17319231328';
		$user = db('sg_user');
		$one = $user->where("u_tel = $tel")->select();
		return view('user',['one'=>$one]);
	}

	//管理收货地址
	public function address()
	{
		$uid =Session::get('u_id');
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
		$data['u_id'] =Session::get('u_id');
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

	public function upda()
	{
		$id = $_POST['id'];
		$uid =Session::get('u_id');
		$uaddress = db("sg_uaddress");
		$data = ['a_state'=>1];
		$res = $uaddress->where("a_id=$id")->update($data);
		if($res){
			$da = ['a_state'=>0];
			$re = $uaddress->where("u_id = $uid AND a_id != $id")->update($da);
			// echo 1;
			$data = $uaddress->where("u_id = $uid")->select();
			// print_r($data);die;
			echo json_encode($data);
		}
	}
}