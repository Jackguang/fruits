<?php
namespace app\index\controller;
use think\Controller;
use think\Db;

class Activty extends Controller{
//    public function index(){
//        $arr=db('sg_active')->select();
//        $this->view->engine->layout(true);
//        $this->assign('arr',$arr);
//        $this->view->engine->layout(true);
//        return view('index');
//    }
    public function act_add()
    {
        if($_POST)
        {
//            print_r($_POST);
//            die;
            unset($_POST['t_id']);
            foreach($_POST['f_id'] as $k=>$v)
            {
                $arr=Db::table('sg_fruits')->where('f_id',$v)->find();
                $v_price=$arr['m_price']*($_POST['price'][$k]*0.1);
                $s_time=strtotime($_POST['hot_star_time'][$k]);
                $e_time=strtotime($_POST['hot_end_time'][$k]);
//                $sql="update sg_fruits set v_price=$v_price,hot_start_time=$s_time,hot_end_time=$e_time,is_hot=1 where f_id=$v";
                $re=Db::query("update sg_fruits set v_price=$v_price,hot_start_time=$s_time,hot_end_time=$e_time,is_hot=1 where f_id=$v");
            }
                echo "<script>alert('添加成功');</script>";
                $this->redirect("activty/act_list");
        }
        else
        {
            $arr=Db::table('sg_type')->select();
            $this->view->engine->layout(true);
            $this->assign('arr',$arr);
            return view('act_add');
        }

    }
    public function act_list()
    {
        $arr=Db::query("select * from sg_fruits where is_hot=1");
        $this->view->engine->layout(true);
        $this->assign('arr',$arr);
        return view('act_list');
    }
    public function ajax(){
        $type=isset($_POST['t_id'])?'t_id':'f_id';
        if($type=='t_id')
        {
            $tid=$_POST['t_id'];
            $arr=Db::table('sg_fruits')->where('t_id',$tid)->where('is_hot','0')->select();
            if($arr)
            {
                echo json_encode($arr);
            }
            else
            {
                $a='1';
                echo json_encode($a);
            }
        }
        else
        {
            $fid=$_POST['f_id'];
            $arr=Db::table('sg_fruits')->where('f_id',$fid)->find();
            if($arr)
            {
                echo json_encode($arr);
            }
            else
            {
                $a='1';
                echo json_encode($a);
            }
        }
    }
    public function activty_delete()
    {
        $id=$_GET['id'];
        $re=Db::query("update sg_fruits set v_price=0,hot_start_time=0,hot_end_time=0,is_hot=0 where f_id=$id");
        if($re)
        {
            echo "<script>alert('取消成功');</script>";
            $this->redirect("activty/act_list");
        }
        else
        {
            echo "<script>alert('取消失败');</script>";
            $this->redirect("activty/act_list");
        }

    }
}