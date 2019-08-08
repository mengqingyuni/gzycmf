<?php

/**
 * Created by IndexController.php.
 * User: gongzhiyang
 * Date: 18/11/16
 * Time: 12:11 上午
 */
namespace home\controller;
use core\gzy\controller\Controller;
use models\Index;



class IndexController extends Controller {


	public function run(){
		echo "Hello World run";
		//var_dump(get("name"));
		// 重定向
		//$this->redirect('/Home/Index/demo');
		$find = new Index();
		var_dump($find->find());
		$this->assign("data",["lkf"=>'dd',"ee"=>'rr']);
		$this->render('Home/Index/index');
	}

	public function demo()
	{
		echo "Hello World demo";










	}
}


