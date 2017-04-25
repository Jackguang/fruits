<?php
namespace app\home\controller;
use think\Controller;
use think\Db;
use think\Session;

class Active extends Controller
{
    public function index(){
        return view("index");
    }

}