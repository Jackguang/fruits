<?php
namespace app\home\controller;

use app\home\model\Ucpaas;
use think\Controller;
use think\Db;
use think\Session;

class User extends Controller
{
//    注册
    public function enter()
    {
        if (isset($_GET['phone'])) {
            $name = $_GET['phone'];
            $options['accountsid'] = '9292e000a8a12cf5d20e01bcf3bcf628';
            $options['token'] = '43830b3701844e04f174ca8b2713c879';
            $ucpass = new Ucpaas($options);
            $appId = "32e56c0917cc4ad3af29f55263d952ea";
            $to = $name;
            $templateId = "42252";
            $a = rand(100000, 999999);
            setcookie('code', $a, time() + 63);

            $a=$ucpass->templateSMS($appId, $to, $templateId, $a);
        }
        return view('enter');
    }

// 判断用户名 和 手机号唯一
    public function enter_b()
    {
        $name = isset($_GET['phone']) ? $_GET['phone'] : $_GET['username'];
        if (isset($_GET['phone'])) {
            $arr = Db::table('sg_user')->where("u_tel", "$name")->select();
            if ($arr) {
                echo 1;
            } else {
                echo 0;
            }
        } else {
            $arr = Db::table('sg_user')->where("u_name", "$name")->select();
            if ($arr) {
                echo 1;
            } else {
                echo 0;
            }
        }

    }

//    验证码
    public function code()
    {
        $code = $_GET['code'];
        $codes = isset($_COOKIE['code']) ? $_COOKIE['code'] : '无验证码';
        if ($code == $codes) {
            echo 1;
        } else {
            echo 0;
        }
    }

//    注册入库
    public function enter_d()
    {
        if ($_COOKIE['code'] != $_POST['code']) {
            echo "<script>alert('验证码失效错误');</script>";
            return view('enter');
        }
        $_POST['u_time'] = date('Y-m-d h:i:s', time());
        $_POST['u_price'] = 0;
        unset($_POST['code']);
        unset($_POST['pwr']);
        $res = Db::table('sg_user')->insert($_POST);
        if ($res) {
            echo "<script>alert('注册成功 ');</script>";
            return view('login');
        } else {
            echo "<script>alert('注册失败，请重新注册');</script>";
            return view('enter');
        }
    }

//    登录
    public function login()
    {
        if ($_POST) {
            $name = $_POST['u_name'];
            $u_pwd = $_POST['u_pwd'];
            $arr = Db::table('sg_user')->where("u_name", "$name")->where('u_pwd', "$u_pwd")->find();
            $arr2= Db::table('sg_user')->where("u_tel", "$name")->where('u_pwd', "$u_pwd")->find();
            $data = $arr ? $arr : $arr2;
            if ($arr || $arr2) {
                $data = $arr ? $arr : $arr2;
                Session::set('u_name', $data['u_name']);
                Session::set('u_tel', $data['u_tel']);
                Session::set('u_id', $data['u_id']);
                echo "<script>alert('');</script>";
                if (empty($data['']))
                    $this->redirect('home/userinfo/user');
            } else {
                echo "<script>alert('账号或密码不正确');</script>";
                return view('enter');
            }
        } else {
            return view('login');
        }
    }
}
