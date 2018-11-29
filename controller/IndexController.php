<?php

/**
 * Created by IndexController.php.
 * User: gongzhiyang
 * Date: 18/11/16
 * Time: 12:11 上午
 */
namespace controller;
use core\gzy\controller\Controller;
use models\Index;


class IndexController extends Controller {

	public function run(){
		echo "我是 Index 制器的 run 方法";

		// 接收参数
		$username = $this->getParams('name','G');

		$password = $this->getParams('pwd','P');
		$email = $this->getParams('email','P');
        $phone = $this->getParams('phone','G');

		// 验证邮箱
		if (!$this->is_email($email)){
			echo "邮箱格式不正确";
		}
		//验证手机号
		if (!$this->is_phone($phone)){
			echo "手机号格式不正确";
		}

		// 重定向
		$this->redirect('/gzyCFM/index.php?c=Index&a=demo');
	}

	public function demo(){
		//phpinfo();
		//echo "我是 Index 制器的 demo 方法"; exit;
		//$m = new Index();

		//var_dump($m->find());

		$this->assign('data',["s"=>2,"3"=>"qq"]);
		//echo readfile("file:///Users/gongzgiyang/www/gzyCFM/runtime/HTML/dbebd60b1b1ff497802718a930bb8d52.php");
		$this->render('Index/demo');




	}
}

