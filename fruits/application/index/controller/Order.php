<?php
namespace app\index\controller;
use think\Controller;
use think\Session;
use app\index\model\Page;

class Order extends Controller
{
	public function show()
	{
		$name = Session::get('name');
		if($name == "")
		{
			 echo "<script>alert('请先登录');window.location.href='../../../index.php/index/login/login'</script>";
		}else
		{
			$order = db('sg_order');
			$order_list = $order->join('sg_uaddress','sg_order.o_address=sg_uaddress.a_id')
            // ->join('sg_fruits','sg_order.f_id = sg_fruits.f_id')
            ->limit(5)->select();

            // foreach($order_list as $k=>$v){
            //     $fruits = db('sg_fruits')->field('f_name')->where("f_id in ($v[f_id])")->select();

            //     // print_r($fruits);die;
            //     $fr="";
            //     foreach($fruits as $kk=>$vv){
                    
            //         // print_r($vv['f_name']);die;
            //         // $fr.=$vv['f_name']+",";

            //         $fruits_name[] = $vv['f_name'];
            //     }
            // print_r($fruits_name);die;
                
            // $fname =implode($fruits_name, ',');
            // $order_list[$k]['ame']=$fname;
            // }


			$page = new Page();
			$count = $order->count();
			$limit = 5;
			$str=$page->page($count,$p=1,$limit);


			$this->view->engine->layout(true);
			return view('show',['order_list'=>$order_list,'str'=>$str]);
			
		}
	}

	public function ajaxs()
	{       
        $str=$_GET;
        $page=$_GET['p'];
        $where[]="1=1";
        if(!empty($str['name'])){
            $where[]="f_name like '%".$str['name']."%'";	
        }

        if(!empty($str['starttime'])){
            $starttime = $str['starttime'];
            $endtime = $str['endtime'];
            $where[]="o_time between  '$starttime' and '$endtime'";	
        }
        if(!empty($str['type'])){
        	$where[]="o_type = '".$str['type']."'";
        }

        $wheres=implode(' And ',$where);
        $limit=5;
        $offset=($page-1)*5;
        $user=db('sg_order');
        $ad_list=$user->join('sg_uaddress','sg_order.o_address=sg_uaddress.a_id')->where("$wheres")->select();
        $count=count($ad_list);
        $list=$user->join('sg_uaddress','sg_order.o_address=sg_uaddress.a_id')->where("$wheres")->limit("$offset,$limit")->select();
        // print_r($list);die;
        $page_model= new Page();
        $page=$page_model->page($count,$page,$limit);
        $data['list']=$list;
        $data['page']=$page;
        echo json_encode($data);
	}
}


