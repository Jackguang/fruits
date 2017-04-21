<?php
namespace app\home\controller;
use think\Controller;
use think\Db;
use think\Session;



class Cart extends Controller
{
    public function index()
    {
        $uid = Session::get('u_id');
       $data= Db::table('sg_fruits')

           ->field('a.f_id,f_name,f_img,f_weight,m_price,f_num,w.u_id')
           ->alias('a')
    ->join('sg_cart w','a.f_id = w.f_id')
    ->where('u_id',$uid)
    ->select();
//        var_dump($data);die;
foreach($data as $k=>$v){
    $a[]=$v['m_price']*$v['f_num'];
}
       $money= array_sum($a);//总钱数
        $this->assign('data',$data);
        $this->assign('money',$money);

        return view('index');
    }
    //最大购买量
    public function ku(){
        $fid=$_POST['fid'];
        $uid=$_POST['uid'];
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
            $rsl=Db::table('sg_cart')
                ->where("f_id = $fid AND u_id =$uid")
                ->setInc('f_num');
            if($rsl){
                echo 2;
            }

        }
//      echo json_encode($max);

    }
    //商品加入购物车
    public function cart(){
        $uid=$_POST['uid'];
        $fid=$_POST['fid'];
       $data= Db::table('sg_cart')
           ->where("f_id = $fid AND u_id =$uid")
           ->find();
        if($data){
            $num=$data['f_num'];//取出原有数量
            //商品已存在过，进行修改数据
            //根据商品id。查库存
           $aq= Db::table('sg_fruits')
           ->where('f_id',$fid)
          ->find();
            $max=$aq['f_surplus'];
            if($max>$num){
                $rsl=Db::table('sg_cart')
                    ->where("f_id = $fid AND u_id =$uid")
                    ->setInc('f_num');
                if($rsl){
                    echo 222;
                }
            }else{
                echo 1;
            }


        }else{
            $arr['u_id']=$uid;
            $arr['f_id']=$fid;
            //商品不存在，进行添加
          $res=  Db::table('sg_cart')->insert($arr);
            if($res){
                echo 222;
            }
        }
//        echo json_encode($data);

    }
    //删除购物车数据
    public function del(){
       $uid= $_POST['uid'];
       $fid= $_POST['fid'];

       $res= Db::table('sg_cart')
            ->where("u_id = $uid AND f_id = $fid")
//            ->where('f_id',$fid)
            ->delete();
        if($res){
           echo 333;
        }
    }
    //减少
    public function kushao(){
$fid=$_POST['fid'];
$uid=$_POST['uid'];

       $data= Db::table('sg_cart')
        ->where("u_id = $uid AND f_id = $fid")
        ->setDec('f_num');
        if($data){
            echo 2;
        }


    }
}