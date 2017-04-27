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
		if(!$tel){
			return view('user/login');
		}

		$name = Session::get('u_name');
		$order_num = count(db('sg_order')->where("u_name='$name'")->select());
		$this->assign('order_num',$order_num);
		$user = db('sg_user');
		$id = Session::get('u_id');
		$arr = Db::table('sg_order')->where('u_id', $id)->where('o_state', '4')->select();
		if(empty($arr))
		{
			$num=0;

			$one = $user->where("u_tel = $tel")->select();
			$this->assign('num',$num);

			return view('user',['one'=>$one]);
		}
		foreach ($arr as $k => $v) {
			$arr[$k]['o_num'] = explode(',', $arr[$k]['o_num']);
			$arr[$k]['o_price'] = explode(',', $arr[$k]['o_price']);
			$arr[$k]['f_id'] = explode(',', $arr[$k]['f_id']);
		}
		foreach ($arr as $k => $v)
		{
			foreach($v['f_id'] as $key=>$val)
			{
				$brr = Db::table('sg_opinion')->where('o_id',$v['o_id'])->where('f_id',$val)->select();

				if(empty($brr))
				{
					$crr=Db::table('sg_fruits')->where('f_id',$val)->find();
					$crr['o_id']=$v['o_id'];
					$crr['o_number']=$v['o_number'];
					$crr['o_num']=$v['o_num'][$key];
					$drr[]=$crr;
				}
			}
		}
		$num=count($drr);
		// $tel = '17319231328';
		$one = $user->where("u_tel = $tel")->select();

		
		$this->assign('num',$num);
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