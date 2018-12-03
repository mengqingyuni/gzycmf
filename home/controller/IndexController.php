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
		echo "欢迎使用";exit;
		$this->render('Home/Index/index');
	}

	public function demo()
	{
		//echo "============";

		//echo get("ss");

	}
}

