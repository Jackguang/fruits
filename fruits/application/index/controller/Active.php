<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use app\index\model\Page;


class Active extends Controller{
    //渲染模板
    public function index(){
        $this->view->engine->layout(true);
        return view('add');
    }
    //活动展示列表
    public function lists(){
        $data=db('sg_active')->select();
        $this->view->engine->layout(true);
        $this->assign('data',$data);
        return view('lists');
    }
    //活动添加
    public function add_do(){
        $data=$_POST;
	//var_dump($data);die;
        $num= \think\Db::table('sg_active')->insert($data);
        if($num){
            $this->redirect("active/lists");
    }
    }
    //活动删除
    public function del(){
        $aid=$_GET['aid'];//获取商品id
        $res=Db::table('sg_active')->where("active_id= $aid")->delete();
        if($res){
            echo 1;
        }else{
            echo 2;
        }
    }
    //活动批删
    public function up(){
        $data=$_POST['aid'];//获取商品id
        $res=Db::table('sg_active')->where("active_id in($data)")->delete();
        if($res){
            echo 1;
        }else{
            echo 2;
        }

//		Db::table('sg_fruits')->where('')->update($data);
    }
    public function show()
    {
        $user = db('sg_active');
        $data = $user->limit(5)->select();


        $page = new Page();
        $count = $user->count(); //总条数
        $limit = 5;
        $str=$page->page($count,$p=1,$limit);


        $this->view->engine->layout(true);
        return view('lists',['data'=>$data,'str'=>$str]);
    }


    public function ajaxs()
    {

        $str=$_GET;
        $page=$_GET['p'];
        $where[]=" 1=1 ";
        if(!empty($str['name'])){
            $where[]="active_name like '%".$str['name']."%'";
        }
        // print_r($where);die;
        $wheres=implode(' And ',$where);

        $limit=5;
        $offset=($page-1)*5;
        $user=db('sg_active');
        // $sql="select * from news_list inner join news_cate on news_cate.nc_id=news_list.nc_id where $wheres";
        $ad_list=$user->where($where)->select();
        // $sql="select * from news_list inner join news_cate on news_cate.nc_id=news_list.nc_id where $wheres limit $offset,$limit";
        $list=$user->where($where)->limit($offset,$limit)->select();
        $count=count($ad_list);
        $page_model== new Page();
        $page=$page_model->page($count,$page,$limit);
        $data['list']=$list;
        $data['page']=$page;
        echo json_encode($data);
    }
}


