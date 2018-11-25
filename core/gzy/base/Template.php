<?php
/**
 * 模板引擎
 * Created by Template.php.
 * User: gongzhiyang
 * Date: 18/11/25
 * Time: 10:09 下午
 */

namespace core\gzy\base;
use core\gzy\base\CompileConfig;


class Template
{
	private $arrayConfig = [
		'suffix'        => '.html', //设置模板文件的缀
		'templateaDir'  => 'views/',//设置模板所在的文件夹
		'compiledir'    => 'runtime/HTML',//设置编译后存放放的目录
		'cache_html'    => 'false',//是否编译成静态的html文件
		'suffix_cache'  =>  '.html',//设置编译文件后缀
		'cache_time'    =>  7200   ,//设置缓存时间
	];

	public $file;
	private $value = [];
	private $compileTool;//编译器
	static private $instance = null;
	function __construct($arrayConfig = [])
	{
		$this->arrayConfig = $arrayConfig+$this->arrayConfig;
		$this->compileTool = new CompileConfig();

	}

	/**
	 * 获取模板引擎的实例
	 * @return Template|null
	 */

	public static function getInstance () {

		if (is_null(self::$instance)) {
			self::$instance = new Template();

		}
		return self::$instance;
	}

	/**
	 * @param      $key
	 * @param null $value
	 * 单步设置引擎
	 */
	public function setConfig($key,$value = null){

		if (is_array($key)) {

			$this->arrayConfig = $key+$this->arrayConfig;

		} else {

			$this->arrayConfig[$key] = $value;
		}
	}

	/**
	 * @param null $key
	 * @return array
	 * 获取当前模板引擎配置，仅供调试
	 */
	public function getConfig($key=null) {

		if ($key) {
			return $this->arrayConfig[$key];
		} else {
			return $this->arrayConfig;
		}

	}

	/**
	 * @param $key
	 * @param $value
	 * 注入单个变量
	 */
	public function assign ($key,$value) {

		$this->value[$key] = $value;

	}

	/**
	 * @param $array
	 * 注入数组变量
	 */

	public function assignArray ($array) {

		if (is_array($array)) {
			foreach ($array as $k=>$v) {
				$this->value[$k] = $v;

			}

		}
	}

	/**
	 * @return string
	 * 存放路径
	 */
	public function path () {
		return $this->arrayConfig['templateaDir'].$this->file.$this->arrayConfig['suffix'];
	}

	/**
	 * @param $file
	 */

	public function show ($file) {

		$this->file = $file;
		echo  $this->path();
		if (!is_file($this->path())) {
			exit ('找不到对应的模板');

		}
		//编译后文件
		$compileFile = $this->arrayConfig['compiledir'].'/'.md5($file).'.php';
		if (!is_file($compileFile)) {
			mkdir($this->arrayConfig['compiledir']);
			$this->compileTool->compile($this->path(),$compileFile);
			readfile($compileFile);
		} else {
			readfile($compileFile);
		}

	}


}