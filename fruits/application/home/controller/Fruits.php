<?php
namespace app\home\controller;
use think\Controller;
use think\Db;



class Fruits extends Controller
{
    public function index()
    {
//        //查询分类
//        $data= db('sg_type')->select();
//        $this->view->engine->layout(true);
        //赋值
        $arr=db('sg_fruits')
            ->where('is_show =1 AND f_surplus > 0')
                ->order('f_time desc')
                ->limit(6)
                ->select();


        $this->assign('arr',$arr);
        $this->assign('a',1);
        return view('index');
    }
    public function show(){
        return view('show');

    }
//    //发送验证码
//    public function fa(){
//        $name=$_GET['phone'];
////        echo $name;die;
//        $options['accountsid']='3490b057c41196e8c455af51f49feeb2';
//        $options['token']='601cbed27dbbb94329f83f833fcc59ed';
//        $ucpass = new Ucpaas($options);
//        $appId = "8138883b95b5445e89ab397429903dc9";
//        $to = $name;
//        $arr=Db::table('sg_user')
//            ->where('u_tel',$name)
//        ->find();
//     if($arr){
//         echo 2;
//     }else{
//         echo 3;
//     }die;
//
//        $templateId = "42141";
//        $a=rand(100000,999999);
////        Session::set('name',$a);
//       $ucpass->templateSMS($appId,$to,$templateId,$a);
////        Db::name('user')->insert($data);
//
//    }

//加载更多
public function jia(){
    $p=$_POST['p'];

//    echo $p;
    //总条数
    $arr=db('sg_fruits')
        ->where('is_show =1 AND f_surplus > 0')
        ->order('f_time desc')
        ->limit(6)
        ->count();
    //总页数、每页显示6条
    $num=ceil($arr/6);
    //下一页
    $ap=$p+1;
//    echo $ap;die;
    if($ap>$num){
        $data['sid']=2;
        $data['pa']=$p;
        echo json_encode($data);
    }else{
        //偏移量
        $limit=($ap-1)*6;
        //返回下一页数据
        $data['resl']= Db::table('sg_fruits')
            ->where('is_show =1 AND f_surplus > 0')
            ->limit($limit,6)
            ->select();
        $data['sid']=1;
        $data['pa']=$p+1;

        echo json_encode($data);
    }



}
    public function info()
    {
        $id =$_GET['id'];
//        echo $id;die;
        //查询商品信息
        $fruits = db('sg_fruits');
        $fruit_one = $fruits->where("f_id = $id")->select();
        //查询商品评价
        $opinion = db('sg_opinion');
        $opinions=$opinion->
        join("sg_user","sg_user.u_id = sg_opinion.u_id")
            ->where("f_id = $id")->select();
        $count = count($opinions);
        if($count)
        {
            $ci=1;
        }
        else{
            $ci=0;
        }
      if(!$opinions){
          return view('info',[
              'fruit_one'=>$fruit_one,
              'opinions'=>1,
              'count'=>'0',
              'ci'=>$ci
          ]);
      }else{
          foreach($opinions as $k=>$v)
          {
              $tels = substr($v['u_tel'],3,4);
              $opinions[$k]['u_tel']=str_replace($tels,'****', $v['u_tel']);
          }
      }

        $this->assign('arr',$opinions);
        $this->assign('count',$count);
        $this->assign('ci',$ci);
        $this->assign('fruit_one',$fruit_one);
        return view('info');
    }

    public function ajaxs()
    {
        $data = $_POST['nums'];
        echo $data;
    }

    //分类查询
    public function classify(){
       $t_id=$_GET['t_id'];
        $arr=db('sg_fruits')
            ->join("sg_type","sg_fruits.t_id = sg_type.t_id")
            ->where("is_show =1 and sg_fruits.t_id=$t_id AND f_surplus > 0")
            ->order('f_time desc')
            ->limit(6)
            ->select();


        $this->assign('arr',$arr);
        $this->assign('a',1);
        return view('classify');


    }
    //根据分类加载下一页
    public function jiaf(){
        $p=$_POST['p'];
        $t_id=$_POST['tid'];

//    echo $p;
        //总条数
        $arr=db('sg_fruits')
            ->where("is_show =1 and t_id= $t_id AND f_surplus > 0")
            ->order('f_time desc')
            ->limit(6)
            ->count();
        //总页数、每页显示6条
        $num=ceil($arr/6);
        //下一页
        $ap=$p+1;
//    echo $ap;die;
        if($ap>$num){
            $data['sid']=2;
            $data['pa']=$p;
            echo json_encode($data);
        }else{
            //偏移量
            $limit=($ap-1)*6;
            //返回下一页数据
            $data['resl']= Db::table('sg_fruits')
                ->where("is_show =1 and t_id= $t_id AND f_surplus > 0")
                ->limit($limit,6)
                ->select();
            $data['sid']=1;
            $data['pa']=$p+1;

            echo json_encode($data);
        }



    }
    //分类展示表
    public function classifyin(){
        $arr=db('sg_fruits')
            ->join("sg_type","sg_fruits.t_id = sg_type.t_id")
            ->where("is_show =1 AND f_surplus > 0")
            ->order('f_time desc')
            ->limit(6)
            ->select();

        $data=db('sg_type')
            ->select();
        $this->assign('arr',$arr);
        $this->assign('data',$data);
        $this->assign('a',1);
        return view('classifyin');
    }
    //最大购买量
    public function ku(){
    $fid=$_POST['fid'];
    $num=$_POST['num'];
        $data=db('sg_fruits')
    ->where('f_id',$fid)
    ->find();
        $max=$data['f_surplus'];
        if($num>=$max){
            //不能更多
            echo 1;
        }else{
            //可以更多
            echo 2;
        }
//      echo json_encode($max);

    }
    //从详情页加入购物车
    public function cartdesc(){
//       echo  json_encode($_POST);die;
        $num=$_POST['num'];
        $fid=$_POST['fid'];

        $q= Db::table('sg_fruits')
            ->field('f_id,f_surplus')
            ->where("f_id = $fid")
            ->find();
//        echo json_encode($q);die;
        $sum=$q['f_surplus'];//库存总个数
//        foreach($q as $k=>$v){
//            $qa[]=$v['f_num'];
//        }
//       $sum= array_sum($qa);//被预定所有
//        echo json_encode($q);die;
        $uid=$_POST['uid'];

        $data= Db::table('sg_cart')
            ->where("f_id = $fid AND u_id =$uid")
            ->find();



        if($data){
            $number=$data['f_num'];
            if($num<=($sum-$data['f_num'])){
                //已存在继续累加
                $a=Db::table('sg_cart')
                    ->where("f_id = $fid AND u_id =$uid")
                    ->update(['f_num' => $num+$number]);
                if($a){
                    echo 222;
                }
            }else{
                echo 333;
            }


        }else{
            //不存在入库
            $arr['f_num']=$_POST['num'];
            $arr['f_id']=$_POST['fid'];
            $arr['u_id']=$_POST['uid'];
            $b=Db::table('sg_cart')->insert($arr);
            if($b){
                echo 222;
            }
        }
    }
//活动
public function act(){

}
    //搜索
    public function sou(){
      $str=  $_POST['str'];//获取水果名称
        $data=Db::table('sg_fruits')
  ->where('f_name','like',"%$str%")
  ->select();
       echo json_encode($data);

    }

}
