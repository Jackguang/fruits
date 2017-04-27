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
        if(!$uid){
            return view('user/login');
        }
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
        if(!isset($a)){

            $this->assign('data',$data);
            $this->assign('money',0);

            return view('index');
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

    //购物车生成订单
    public function ruku(){
        $data['u_id'] = Session::get('u_id');
        $uid = Session::get('u_id');
//        echo $uid;die;
        $data['u_name'] = Session::get('u_name');
        $data['f_name'] = '';
        $data['o_address'] = '';
        $data['o_type'] = '';
        $data['o_num']=$_POST['num'];//数量
        $data['sg_fruitsname']=$_POST['username'];//数量

        $data['f_id']=$_POST['str'];//商品id
        $data['o_price']=$_POST['price'];//单价
        $data['all_price']=$_POST['allprice'];//总价
        $data['o_time']=date("Y-m-d H:i:s");//下单时间

        $data['o_number']=$uid.time();//总价


        $res=Db::table('sg_order')->insert($data);
//      if($res){
//          echo 1;die;
//      }  else{
//          echo 2;die;
//      }
        $userId = Db::table('sg_order')->getLastInsID();
        Db::table('sg_order')
          ->where('o_id',$userId)
          ->update(['o_number' => $uid.time().$userId]);



        if($res){
         $arr=$data['f_id'];
            //订单成功。删除响应购物车数据
           $resls= Db::table('sg_cart')
                ->where("u_id = $uid AND f_id in($arr)")
                ->delete();
            if($resls){
                Session::set('name','thinkphp');
                echo 333;

            }else{
                echo 222;
            }
        }

    }
    //付款
    public function buy(){
        $uid = Session::get('u_id');
//        echo $uid;die;
        $data=Db::table('sg_order')
        ->where("u_id = $uid")
        ->order('o_number desc')
            ->limit(1)
            ->find();
//        var_dump($data);die;
//        var_dump($data);die;
             $a=explode(',',$data['f_id']);//商品id
             $price=explode(',',$data['o_price']);//商品单价
             $num=explode(',',$data['o_num']);//商品数量
        foreach($a as $k=>$v){
            $list[]=Db::table('sg_fruits')
                ->field('f_id,f_name,f_img,f_weight,f_title,m_price')
                ->where("f_id = $v")
                ->find();
        }

        foreach($a as $k=>$v){
            $arr[$k]['f_id']=$a[$k];//商品id
            $arr[$k]['price']=$price[$k];//商品单价
            $arr[$k]['num']=$num[$k];//商品数量
        }

//        var_dump($res);die;
        $address=Db::table('sg_uaddress')
            ->where("u_id = $uid AND a_state = 1")
            ->find();
        if(!$address){
            $address=2;
            $this->assign('num',$num); //数量
            $this->assign('data',$data); //总值
            $this->assign('list',$list); //单个详情
            $this->assign('address',$address); //单个详情

            return view('buy');
        }else{
            $this->assign('num',$num); //数量
            $this->assign('data',$data); //总值
            $this->assign('list',$list); //单个详情
            $this->assign('address',$address); //地址

            return view('buy');
        }

    }
//onclick="javascript:window.history.back();后退
//添加收货地址
public function address(){
    $data=$_POST;
    $data['u_id'] = Session::get('u_id');
    $uid = Session::get('u_id');
    $data['a_state'] = 1;
    $res=Db::table('sg_uaddress')->insert($data);
    $arr=Db::table('sg_uaddress')->insertGetId($data);

    if($arr){
        echo $arr;
    }else{
        $res=Db::table('sg_uaddress')
            ->where("u_id = $uid  AND a_state = 1")
            ->find();
//        var_dump($res);die;
        echo $res['a_id'];

    }

}
    //付款后
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\View
     * @throws \think\Exception
     */
    public function payfor(){
        $uid = Session::get('u_id');
        //假设付款成功
        $str=$_GET['str'];//订单,地址id
//        echo $str;die;
        $arr=explode(',',$str);
        //选择了收货地址
        //            **************chen******判断库存是否够**********
        $data=Db::table('sg_order')
            ->alias('a')
            ->join('sg_uaddress w','a.o_address = w.a_id')
            ->where("o_id = $arr[0]")
            ->find();

        $a=explode(',',$data['f_id']);//商品id
        $price=explode(',',$data['o_price']);//商品单价
        $num=explode(',',$data['o_num']);//商品数量
        foreach($a as $k=>$v){
            $list[]=Db::table('sg_fruits')
                ->field('f_id,f_name,f_img,f_weight,f_title,m_price')
                ->where("f_id = $v")
                ->find();

        }
//                ***************比较库存*******
        foreach($a as $k=>$v){
            $res= Db::table('sg_fruits')
                ->where("f_id = $v ")
                ->find();
            $number= $res['f_surplus'];
            $name= $res['f_name'];
            if($number<$num[$k]){
               echo "<script>alert($name+'库存不足');</script>";die;
            }


        }
//            *********************chen****************
        //改变付款状态
        $res=Db::table('sg_order')
        ->where('o_id', $arr[0])
       ->update(['o_state' => 1,'o_address'=>$arr[1]]);
        //根据订单id,获取订单详细信息
        $data=Db::table('sg_order')
            ->alias('a')
            ->join('sg_uaddress w','a.o_address = w.a_id')
            ->where("o_id = $arr[0]")
            ->find();
       $money= $data['all_price'];
        //消费累加user
        Db::table('sg_user')
            ->where("u_id = $uid")
            ->setInc('u_price', $money);


//        var_dump($data);die;
        $a=explode(',',$data['f_id']);//商品id
        $price=explode(',',$data['o_price']);//商品单价
        $num=explode(',',$data['o_num']);//商品数量
        foreach($a as $k=>$v){
            $list[]=Db::table('sg_fruits')
                ->field('f_id,f_name,f_img,f_weight,f_title,m_price')
                ->where("f_id = $v")
                ->find();

        }
  //减去库存
        foreach($a as $k=>$v){
            $res= Db::table('sg_fruits')
                ->where("f_id = $v ")
                ->find();
            $number= $res['f_surplus'];
            Db::table('sg_fruits')
                ->where("f_id = $v ")
                ->update(['f_surplus' => $number-$num[$k]]);
        }

        $this->assign('data',$data); //订单信息
        $this->assign('list',$list); //单个水果信息
        $this->assign('num',$num); //水果数量
//        $this->assign('data',$data); //订单信息

        return view('payfor');
    }
    //个人所有订单
    public function orderinfo(){

        $uid = Session::get('u_id');//用户id
//        echo $uid;die;
       $data= Db::table('sg_order')
           ->alias('a')
           ->join('sg_uaddress w','a.o_address = w.a_id')
           ->where("a.u_id = $uid ")
           ->order('o_state desc')
           ->select();
        if(!$data){
            $this->assign('num',0); //商品数量

            return view('orderinfo');
        }else{
            foreach($data as $k=>$v){
                $a[]=explode(',',$v['f_id']);
                $num[]=explode(',',$v['o_num']);
//          $a=explode(',',$v['f_id']);


            }
//每一份数量

            foreach($a as $k=>$v){

                foreach($v as $ke=>$ve){

//                $va[]=$ve;
                    $list[$k][]=Db::table('sg_fruits')
                        ->field('f_id,f_name,f_img,f_weight,f_title,m_price')
                        ->where("f_id = $ve")
                        ->find();

                }
            }


            $this->assign('data',$data); //水果信息
            $this->assign('list',$list); //水果单个详细信息
            $this->assign('num',$num); //商品数量

            return view('orderinfo');
        }

    }

    //单个订单物流详情
    public function logistics(){
         $o_id=$_GET['oid'];
        $data=Db::table('sg_order')
            ->alias('a')
            ->join('sg_uaddress w','a.o_address = w.a_id')
            ->where("o_id = $o_id")
            ->find();

        $a=explode(',',$data['f_id']);//商品id
        $price=explode(',',$data['o_price']);//商品单价
        $num=explode(',',$data['o_num']);//商品数量
        foreach($a as $k=>$v){
            $list[]=Db::table('sg_fruits')
                ->field('f_id,f_name,f_img,f_weight,f_title,m_price')
                ->where("f_id = $v")
                ->find();

        }

//var_dump($list);die;
        $this->assign('data',$data); //本条订单大信息
        $this->assign('num',$num); //本条订单数量
        $this->assign('list',$list); //商品详细信息
        return view('logistics');

    }
    //用户确认订单收货
    public function orderstate(){
       $o_id= $_POST['o_id'];

       $res= Db::table('sg_order')
         ->where("o_id = $o_id")
         ->update(['o_state' => 4,'receiving_time'=>date("Y-m-d H:i:s")]);
        if($res){

            $data=Db::table('sg_order')
                ->alias('a')
                ->join('sg_uaddress w','a.o_address = w.a_id')
                ->where("o_id = $o_id")
                ->find();

            $a=explode(',',$data['f_id']);//商品id
            $price=explode(',',$data['o_price']);//商品单价
            $num=explode(',',$data['o_num']);//商品数量
            foreach($a as $k=>$v){
                $list[]=Db::table('sg_fruits')
                    ->field('f_id,f_name,f_img,f_weight,f_title,m_price')
                    ->where("f_id = $v")
                    ->find();

            }
//var_dump($list);die;
        $resli['data']=$data; //本条订单大信息
        $resli['num'] =$num; //本条订单数量
         $resli['list']=$list; //商品详细信息
         $resli['az']=2; //商品详细信息
            echo json_encode($resli);
        }else{
            $res['az']=1; //商品详细信息
            echo json_encode($res);
        }

    }
    //用户所有未付款订单
    public function unpaid(){

        $uid = Session::get('u_id');//用户id
//        echo $uid;die;
        $data= Db::table('sg_order')
            ->alias('a')
//            ->join('sg_uaddress w','a.o_address = w.a_id')
            ->where("a.u_id = $uid AND o_state =0 ")
            ->select();
//        var_dump($data);die;

        if(!$data){
            $this->assign('num',0); //商品数量
//echo 111;die;
            return view('unpaid');
        }else{
//            echo 222;die;
            foreach($data as $k=>$v){
                $a[]=explode(',',$v['f_id']);
                $num[]=explode(',',$v['o_num']);
//          $a=explode(',',$v['f_id']);


            }
//每一份数量

            foreach($a as $k=>$v){

                foreach($v as $ke=>$ve){

//                $va[]=$ve;
                    $list[$k][]=Db::table('sg_fruits')
                        ->field('f_id,f_name,f_img,f_weight,f_title,m_price')
                        ->where("f_id = $ve")
                        ->find();

                }
            }

           $address =Db::table('sg_uaddress')
                ->where("u_id = $uid AND a_state = 1")
                ->find();
            if(!$address){
                $add=0;
                $this->assign('data',$data); //水果信息
                $this->assign('list',$list); //水果单个详细信息
                $this->assign('num',$num); //商品数量
                $this->assign('address',$add); //地址

                return view('unpaid');
            }else{
                $add=$address['a_id'];
                $this->assign('data',$data); //水果信息
                $this->assign('list',$list); //水果单个详细信息
                $this->assign('num',$num); //商品数量
                $this->assign('address',$add); //地址

                return view('unpaid');
            }

        }

    }
//    订单在未付款中付款
        public function payment(){
            $uid = Session::get('u_id');//用户id
            $o_id= $_POST['o_id'];
            $address= $_POST['address'];
//            **************chen******判断库存是否够**********
            $data=Db::table('sg_order')
                ->alias('a')
                ->join('sg_uaddress w','a.o_address = w.a_id')
                ->where("o_id = $o_id")
                ->find();

            $a=explode(',',$data['f_id']);//商品id
            $price=explode(',',$data['o_price']);//商品单价
            $num=explode(',',$data['o_num']);//商品数量
            foreach($a as $k=>$v){
                $list[]=Db::table('sg_fruits')
                    ->field('f_id,f_name,f_img,f_weight,f_title,m_price')
                    ->where("f_id = $v")
                    ->find();

            }
//                ***************比较库存*******
            foreach($a as $k=>$v){
                $res= Db::table('sg_fruits')
                    ->where("f_id = $v ")
                    ->find();
                $number= $res['f_surplus'];
                $name= $res['f_name'];
                if($number<$num[$k]){
                    $resli['az']=3.; //商品详细信息
                    $resli['list']=$name; //商品详细信息
                    echo json_encode($resli);die;
//                    echo "<script>alert($name+'库存不足');</script>";die;
                }
//                if($number<$num[$k]){
//                    $resli['az']=3.; //商品详细信息
//                    echo json_encode($resli);die;
//                }


            }
//            *********************chen****************



            $res= Db::table('sg_order')
                ->where("o_id = $o_id")
                ->update(['o_state' => 1,'receiving_time'=>date("Y-m-d H:i:s"),'o_address'=>$address]);
            if($res){

                $data=Db::table('sg_order')
                    ->alias('a')
                    ->join('sg_uaddress w','a.o_address = w.a_id')
                    ->where("o_id = $o_id")
                    ->find();

                $a=explode(',',$data['f_id']);//商品id
                $price=explode(',',$data['o_price']);//商品单价
                $num=explode(',',$data['o_num']);//商品数量
                foreach($a as $k=>$v){
                    $list[]=Db::table('sg_fruits')
                        ->field('f_id,f_name,f_img,f_weight,f_title,m_price')
                        ->where("f_id = $v")
                        ->find();

                }
//                **********减去库存****
                foreach($a as $k=>$v){
                    $res= Db::table('sg_fruits')
                        ->where("f_id = $v ")
                        ->find();
                    $number= $res['f_surplus'];

                    Db::table('sg_fruits')
                        ->where("f_id = $v ")
                        ->update(['f_surplus' => $number-$num[$k]]);
                }
                //************************把消费加到个人消费上***************************
                $reslist=Db::table('sg_order')
                    ->alias('a')
                    ->join('sg_uaddress w','a.o_address = w.a_id')
                    ->where("o_id = $o_id")
                    ->find();
                $money= $reslist['all_price'];
                //消费累加user
                Db::table('sg_user')
                    ->where("u_id = $uid")
                    ->setInc('u_price', $money);

//var_dump($list);die;
                $resli['data']=$data; //本条订单大信息
                $resli['num'] =$num; //本条订单数量
                $resli['list']=$list; //商品详细信息
                $resli['az']=2; //商品详细信息
                echo json_encode($resli);
            }else{
                $resli['az']=1; //商品详细信息
                echo json_encode($resli);
            }
         }



}