<?php

/**
 * 路由类
 * Created by Route.php.
 * User: gongzhiyang
 * Date: 18/11/16
 * Time: 12:06 上午
 */
namespace core\lib;
use Noodlehaus\Config;
class Route
{
	private $modules;       //默认模块
	private $controller;    //默认控制器
	private $action;        //默认方法
	private $conf;          //配置文件


	public function __construct() {
		$this->conf = new Config(YIN_PATH. '/config/conf.php');
	}

	/**
	 * 路由的分发
	 */
	public function dispatcher() {
		//echo $_SERVER['REQUEST_URI'];exit;
		switch ($this->conf->get('url_route')) {
			//斜杠模式
			case 'PATH_INFO' :

				$request = $this->getRequest();
				//var_dump($this->parsePathUri($request));
				//$this->parsePathUri($request);
				break;

			default :
				$request = $this->getRequest();
				break;
		}
		return $request;
	}

//	/**
//	 * @return mixed
//	 */
//	public function getRequest() {
//
//		return true;
//	}
	/**
	 * 获取controller和action
	 */
	private function getRequest(){

		$this->modules    = isset($_GET['g']) ? $_GET['g'] : $this->conf->get('modules');
		$this->controller = isset($_GET['c']) ? $_GET['c'] : $this->conf->get('controller');
		$this->action     = isset($_GET['a']) ? $_GET['a'] : $this->conf->get('action');
		return [
			"modules"    => $this->modules,
			"controller" => $this->controller,
			"action"     => $this->action,
		];
	}


	/**
	 * @param $request
	 */
	public function parsePathUri($request){

	}

}