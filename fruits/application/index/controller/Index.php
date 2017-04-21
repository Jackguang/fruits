<?php
namespace app\index\controller;
use think\Controller;

class Index extends Controller
{
	public function index()
	{
//		$this->view->engine->layout(true);

		return view('index');
	}

	//网站后台首页
	public function show()
	{		
		$this->view->engine->layout(true);
		return view('show');
	}

	//水果列表
	public function lists()
	{
//		echo 222;
		$this->view->engine->layout(true);
		return view('list');
	}



}