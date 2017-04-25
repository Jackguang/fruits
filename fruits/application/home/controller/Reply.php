<?php
namespace app\home\controller;
use think\Controller;
use think\Db;
use think\Session;

class Reply extends Controller
{
//    为平论商品列表
    public function order_list()
    {
//        $id = Session::get('u_id');
        $id=22;
        $arr = Db::table('sg_order')->where('u_id', $id)->where('o_state', '1')->select();
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
        $this->assign('arr',$drr);
        return view("order_list");
    }

    public function reply_show()
    {
//        $id=$_GET['id'];
//        $id=Session::get('u_id');
        $id=22;
        $arr=Db::table('sg_order')->where('u_id',$id)->select();
        foreach($arr as $k=>$v)
        {
            $arr[$k]['o_num']=explode(',',$arr[$k]['o_num']);
            $arr[$k]['o_price']=explode(',',$arr[$k]['o_price']);
            $ids[]=explode(',',$arr[$k]['f_id']);
            $arr[$k]['f_id']=explode(',',$arr[$k]['f_id']);
        }
//        foreach($ids as $k=>$v)
//        {
//            $id_s[]=$v[0];
//            $id_s[]=$v[1];
//        }
//        foreach($id_s as $k=>$v)
//        {
//            $arr=Db::table('sg_opinion')->where('f_id',$v)->where('u_id','')->find();
//        }
        foreach($arr['f_id'] as $k=>$v)
        {
            $date[]=Db::table('sg_fruits')->where('f_id',$v)->find();
        }
        $this->assign('date',$date);
        $this->assign('arr',$arr);
        return view("reply_show");
    }
//    评论
    public function reply_add()
    {

        $o_id=$_POST['o_id'];
//        $f_id=$_POST['f_id'];
        $_POST['u_id']=Session::get('u_id');
        $_POST['opinion_statu']=1;
        $_POST['opinion_reply']=0;
        $_POST['opinion_time']=time();
        $error=Db::table('sg_opinion')->insert($_POST);
        if($error)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }




    }
}






?>