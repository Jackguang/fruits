<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use app\index\model\Fruits;
use think\Session;

class Goods extends Controller
{
	public function index()
	{
		$name = Session::get('name');
		if($name == '')
		{
			echo "<script>alert('请先登录');window.location.href='../../../index.php/index/login/login'</script>";
			// $this->redirect('index/Login/login');
		}else{
			//查询分类
			$data= db('sg_type')->select();
			$this->view->engine->layout(true);
			//赋值
			$this->assign('data',$data);
			return view('index');
		}

	}

	//网站后台首页
	public function addg()
	{
		$file = request()->file('img');
        $data=$_POST;
//		var_dump($data);die;
		if(isset($file)){
			// 获取表单上传文件 例如上传了001.jpg
      // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->move(ROOT_PATH . 'public/uploads');
//			var_dump($info) ;die;

        if($info){
			       // 成功上传后 获取上传信息
			$a=$info->getSaveName();
			$imgp= str_replace("\\","/",$a);
			$imgpath='uploads/'.$imgp;

            $data['f_img']= $imgpath;


  }else{
				      // 上传失败获取错误信息
     echo $file->getError();
   }
		}

		$data['f_time']=time();
//		var_dump($data);die;
		$num= \think\Db::table('sg_fruits')->insert($data);
		if($num){
//			return $this->success('商品添加成功', 'Goods/lists');
			$this->redirect("goods/lists");

		}



//		$this->view->engine->layout(true);
//		return view('show');
	}

	//水果列表
	public function lists()
	{
//		商品关联分类查询 普通展示
//		$data = db('sg_fruits')
//			->join('sg_type', 'sg_fruits.t_id = sg_type.t_id')
//			->select();
//		$this->view->engine->layout(true);
//		$this->assign('data', $data);
//		return view('lists');
//
		$name = Session::get('name');
		if($name == '')
		{
			echo "<script>alert('请先登录');window.location.href='../../../index.php/index/login/login'</script>";
			// $this->redirect('index/Login/login');
		}else{
			//分页展示
			//总条数
			$count=db('sg_fruits')
				->join('sg_type','sg_fruits.t_id = sg_type.t_id')
				->count();
			//默认当前页1//每页显示条数
			$p=1;$num=5;
			$limit=($p-1)*$num;
			$fruits=new Fruits();
			$page=$fruits->fen($count,$p,$num);
			$data=db('sg_fruits')
				->join('sg_type','sg_fruits.t_id = sg_type.t_id')
				->limit($limit,$num)
				->select();
			//查询分类
			$type= db('sg_type')->select();

			// 把分页数据赋值给模板变量list
			$this->view->engine->layout(true);

			$this->assign('data', $data);
			$this->assign('page', $page);
			$this->assign('type', $type);
			$this->assign('num', $num);

			// 渲染模板输出
			return $this->fetch();
		}


	}
	//单删
	public function del(){
		$fid=$_GET['fid'];//获取商品id
		$res=Db::table('sg_fruits')->where("f_id= $fid")->delete();
		if($res){
			echo 1;
		}else{
			echo 2;
		}

//		Db::table('sg_fruits')->where('')->update($data);

	}
	//批删
	public function up(){
		$data=$_POST['fid'];//获取商品id
		$res=Db::table('sg_fruits')->where("f_id in($data)")->delete();
		if($res){
			echo 1;
		}else{
			echo 2;
		}

//		Db::table('sg_fruits')->where('')->update($data);
	}
	//单条修改渲染
	public function modify(){
       $fid=$_GET['fid'];
		$res=db('sg_fruits')
			->join('sg_type','sg_fruits.t_id = sg_type.t_id')
			->where("f_id =$fid")
			->find();
//		$res=Db::table('sg_fruits')->where("f_id =$fid")->find();
		//分类
		$re= db('sg_type')->select();
		$this->view->engine->layout(true);
		$this->assign('data',$res);
		$this->assign('re',$re);
		return view('modify');

	}
	//接值修改
	public function upto(){
    $data=$_POST;
		$f_id=$data['f_id'];
		$file = request()->file('img');
		if($file){
			// 移动到框架应用根目录/public/uploads/ 目录下
			$info = $file->move(ROOT_PATH . 'public/uploads');

//			var_dump($info) ;die;

			if($info){
				// 成功上传后 获取上传信息
				$a=$info->getSaveName();
				$imgp= str_replace("\\","/",$a);
				$imgpath='uploads/'.$imgp;

				$data['f_img']= $imgpath;
				$resd=Db::table('sg_fruits')->where("f_id=$f_id")->update($data);
				if($resd){
					$this->redirect("goods/lists");
				}
}
			}else{
//根据商品id修改
					$res=Db::table('sg_fruits')->where("f_id=$f_id")->update($data);
			if($res){
				$this->redirect("goods/lists");
			}

		}

	}
	//分页2往后
	public function  page(){
		if(isset($_POST['id'])){
			$arr=$_POST;
//			var_dump($arr);die;
			$where[]='1=1';
			if(!empty($arr['is_hot	'])){
				$a = $arr['is_hot'];
				$where[]= 'is_hot ='."$a";
			}
			if(!empty($arr['is_show'])) {
				$b = $arr['is_show'];
				$where[] = 'is_show =' . "$b";
			}
			if(!empty($arr['t_id'])) {
				$d = $arr['t_id'];
				$where[] = 'sg_fruits.t_id ='."$d";
			}
			if(!empty($arr['f_name'])) {
				$c = $arr['f_name'];
				$where[] = 'f_name	like \'%' . "$c".'%\'';
			}

			$wh=implode(' AND ',$where);
//			echo $wh;die;

			$num=$_POST['num'];
			$p=$_POST['p'];
			$fruits=new Fruits();
			//总条数
			$count=db('sg_fruits')
				->join('sg_type','sg_fruits.t_id = sg_type.t_id')
				->where($wh)
				->count();
			$data['page']=$fruits->fen($count,$p,$num);
			$limit=($p-1)*$num;
			$data['list']=db('sg_fruits')
				->join('sg_type','sg_fruits.t_id = sg_type.t_id')
				->where($wh)
				->limit($limit,$num)
				->select();
			echo json_encode($data);
		}else{
			$num=$_POST['num'];
			$p=$_POST['p'];
			$fruits=new Fruits();
			//总条数
			$count=db('sg_fruits')
				->join('sg_type','sg_fruits.t_id = sg_type.t_id')
				->count();
			$data['page']=$fruits->fen($count,$p,$num);
			$limit=($p-1)*$num;
			$data['list']=db('sg_fruits')
				->join('sg_type','sg_fruits.t_id = sg_type.t_id')
				->limit($limit,$num)
				->select();
			echo json_encode($data);
		}




	}
	//渲染视频页面
	public function upload(){
		return $this->fetch('up');
	}
	//接上传的值
	public function jie(){
//		print_r($_FILES["file"]);die;
		$myfile=$_FILES["file"];
		$tmp=$myfile['tmp_name'];
		$a='uploads/'.time().'.mp4';
		$path=ROOT_PATH .'public/'.$a ;

     $data['f_img']=$a;
		if(!move_uploaded_file($tmp,$path)) die('视频上传失败');
		$num= \think\Db::table('sg_fruits')->insert($data);
		if($num){
			$this->redirect("goods/listv");

		}

	}
	//视频展示
	public function listv(){
		$re=Db::query('select * from sg_fruits where f_id = 78');
		$this->view->engine->layout(true);
	    $res=$re[0]['f_img'];

		$this->assign('res',$res);
		return view();


	}




}