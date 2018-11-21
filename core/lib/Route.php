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
	private $conf;          //配置文件

	public function __construct() {
		$this->conf = new Config(YIN_PATH. '/config/conf.php');
	}

	/**
	 * 路由的分发
	 */
	public function dispatcher() {
		switch ($this->conf->get('route')) {
			case 'path' :
				$request = $this->getRequest();
				$this->parsePathUri($request);
				break;

			default :
				return false;
				break;
		}
		return true;
	}

	/**
	 * @return mixed
	 */
	public function getRequest() {
		return true;
	}

	/**
	 * @param $request
	 */
	public function parsePathUri($request){

	}

}