<?php

/**
 * 框架核心类
 * Created by Gzy.php.
 * User: gongzhiyang
 * Date: 18/11/15
 * Time: 11:46 下午
 */
namespace core\gzy;
use core\lib\Route;
use Noodlehaus\Config;
class Gzy
{
	private $modules;       //默认模块
	private $controller;    //默认控制器
	private $action;        //默认方法
	private $conf;          //配置文件

	public function __construct() {
		$this->conf = new Config(YIN_PATH. '/config/conf.php');

	}

	public function run(){
		//echo "====";exit;
		// 路由分发功能
		$route = new Route();
		// 根据一些列的路由方法目的也是找到$_GET['c']和$_GET['a']
		// 只不过方法更严谨，从 $_SERVER 里获取相应的内容
		$route->dispatcher();
		// 这里我们直接获取
		$this->getRequest();
		$class = "\\$this->modules\\controller\\".ucfirst($this->controller)."Controller";
		//echo YIN_PATH. '/config/conf.php';
        //echo $class;
		$obj = new $class();
		$action = $this->action;
		$obj->$action();


	}

	/**
	 * 获取controller和action
	 */
	public function getRequest(){

		$this->modules = isset($_GET['g']) ? $_GET['g'] : $this->conf->get('modules');
		$this->controller = isset($_GET['c']) ? $_GET['c'] : $this->conf->get('controller');
		$this->action = isset($_GET['a']) ? $_GET['a'] : $this->conf->get('action');
	}


}