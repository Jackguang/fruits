<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use \traits\controller\Jump;
use think\Session;

class Login extends Controller
{
	public function login()
	{
		
		return view('login');
	}

	public function posts()
	{
		header("content-type:text/html;charset=utf-8");
		$name = $_POST['name'];
		$pwd = $_POST['password'];
		$table = Db::table('sg_admin');
		$where = ['a_name'=>$name,'a_pwd'=>$pwd];
		$res = $table->where($where)->find();
		Session::set('name',$name);
		Session::set('a_id',$res['a_id']);

		if($res){
			 echo "<script>alert('登录成功')</script>";
			$this->redirect('index/Index/show');

		}else{
			echo "<script>alert('登录失败');location.href='login'</script>";
		}
		                                                                                                                                                                                                                                                                                                                                                                                                                                            
	}

	public function loginout()
	{
		Session::delete('name');
		$this->redirect('index/Login/login');		
	}
}