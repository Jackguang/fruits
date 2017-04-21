<?php
namespace app\index\model;

use think\Model;

class Fruits{
     public function fen($count,$p,$num)
    {
        //分页数据
        $pageSum=ceil($count/$num);//总页数
        $prevPage=$p-1>1?$p-1:1;//上一页
        $nextPage=$p+1<$pageSum?$p+1:$pageSum;//下一页;
        $str='';
        $str.='<a href="javascript:page(1)">首页</a>';
        $str.='<a href="javascript:page('.$prevPage.')">上一页</a>';
        $str.=$p.'/'.$pageSum;
        $str.='<a href="javascript:page('.$nextPage.')">下一页</a>';
        $str.='<a href="javascript:page('.$pageSum.')">末页</a>';
        return $str;

    }
}



?>