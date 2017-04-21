<?php
namespace app\index\controller;
use think\Controller;
use think\Session;
use app\index\model\Page;
class User extends Controller
{
	public function show()
	{
        $name = Session::get('name');
        if($name == '')
        {
            echo "<script>alert('请先登录');window.location.href='../../../index.php/index/login/login'</script>";
            // $this->redirect('index/Login/login');
        }else
        {
    		$user = db('sg_user');
            $data = $user->limit(5)->select();
    		$page = new Page();
    		$count = $user->count(); //总条数
    		$limit = 5;
    		$str=$page->page($count,$p=1,$limit);
    		$this->view->engine->layout(true);
    		return view('show',['data'=>$data,'str'=>$str]);
        }       
	}

	public function ajaxs()
	{       
        $str=$_GET;
        $page=$_GET['p'];
        $where[]="1=1";
        if(!empty($str['name'])){
            $where[]="u_name like '%".$str['name']."%'";	
        }

        if(!empty($str['type'])){
            if($str['type']=='会员'){
                $where[] = "u_price >= 500";
            }else if($str['type']=='普通用户'){
                $where[] = "u_price < 500";
            }
        }

        if(!empty($str['starttime'])){
            $starttime = $str['starttime'];
            $endtime = $str['endtime'];
            $where[]="u_time between  '$starttime' and '$endtime'"; 
        }

        $wheres=implode(' And ',$where);
        $limit=5;
        $offset=($page-1)*5;
        $user=db('sg_user');
        $ad_list=$user->where("$wheres")->select();
        $count=count($ad_list);

        $list=$user->where("$wheres")->limit("$offset,$limit")->select();
        // print_r($list);die;
        $page_model= new Page();
        $page=$page_model->page($count,$page,$limit);
        $data['list']=$list;
        $data['page']=$page;
        echo json_encode($data);
	}
}