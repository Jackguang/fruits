<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Session;
//use think\Request;

class Hard extends Controller
{
    public function opinoin_list()
    {
        $arr=Db::query("select * from sg_opinion as a LEFT JOIN sg_user as b on a.u_id=b.u_id");
//        $arr=db('sg_opinion')->select();
        $this->view->engine->layout(true);
        $this->assign('arr',$arr);
        return view('opinion_list');
    }
    public function opinoin_details()
    {
        $id=$_GET['id'];
        $arr=Db::query("select * from sg_opinion as a LEFT JOIN sg_user as b on a.u_id=b.u_id where opinion_id=$id");
        $arr=$arr[0];
        Db::query("update sg_opinion set opinion_statu=0 where opinion_id=$id");
        $this->view->engine->layout(true);
        $this->assign('arr',$arr);
        return view('opinoin_details');
    }
    public function reply()
    {
        $arr['o_id']= input('post.o_id');
        $id= input('post.o_id');
        $arr['reply_content'] = input('post.content');
        $a_id = Session::get('a_id');
        $arr['a_id'] = $a_id;
        $arr['reply_time'] = time();
        $error=Db::table('sg_reply')->insert($arr);
        if($error)
        {
            Db::query("update sg_opinion set opinion_reply=0 where opinion_id=$id");
            echo "<script>alert('回复成功');</script>";
            $this->redirect("hard/opinoin_list");
        }
    }
    public function reply_list()
    {
        $arr=Db::query("select * from sg_reply as a LEFT JOIN sg_admin as b ON a.a_id=b.a_id INNER JOIN sg_opinion as c ON a.o_id=c.opinion_id INNER JOIN sg_user as d ON c.u_id=d.u_id");
        $this->view->engine->layout(true);
        $this->assign('arr',$arr);
        return view('reply_list');
    }
    public function reply_details()
    {
        $id=isset($_GET['sg_opinion'])?input('get.sg_opinion'):input('get.sg_reply');
        $type=isset($_GET['sg_opinion'])?'sg_opinion':'sg_reply';
        if($type=='sg_opinion')
        {
            $arr=Db::query("select * from $type as a LEFT JOIN sg_user as b on a.u_id=b.u_id where opinion_id=$id");
            $arr=$arr[0];
//            $arr=db("$type")->where("opinion_id=$id")->find();
            $panduan='';
        }
        else
        {
            $arr=Db::query("select * from $type as a LEFT JOIN sg_admin as b on a.a_id=b.a_id where reply_id=$id");
            $arr=$arr[0];
//            $arr=db("$type")->where("reply_id=$id")->find();
            $panduan='2';
        }
        $this->view->engine->layout(true);
        $this->assign('arr',$arr);
        $this->assign('panduan',$panduan);
        return view('reply_details');

    }
}