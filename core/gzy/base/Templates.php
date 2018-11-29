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
use Noodlehaus\Config;

class Templates implements Template
{


	public $file;
	private $value = [];
	private $compileTool;//编译器
	static private $instance = null;
	function __construct($arrayConfig = [])
	{
		$this->arrayConfig = new Config(YIN_PATH. '/config/conf.php');
		$this->compileTool = new CompileConfig();

	}

	/**
	 * 获取模板引擎的实例
	 * @return Template|null
	 */

	public static function getInstance () {

		if (is_null(self::$instance)) {
			self::$instance = new Templates();

		}
		return self::$instance;
	}

	/**
	 * @param      $key
	 * @param null $value
	 * 单步设置引擎
	 */
	public  function setConfig($key,$value = null){

		if (is_array($key)) {

			$this->arrayConfig = $key+$this->arrayConfig["template"];

		} else {

			$this->arrayConfig["template"][$key] = $value;
		}
	}

	/**
	 * @param null $key
	 * @return array
	 * 获取当前模板引擎配置，仅供调试
	 */
	public function getConfig($key=null) {

		if ($key) {
			return $this->arrayConfig["template"][$key];
		} else {
			return $this->arrayConfig["template"];
		}

	}

	/**
	 * @param $key
	 * @param $value
	 * 注入单个变量
	 */
	public function assign ($key,$value) {

		$this->value[$key] = $value;

		//echo $this->value[$key];

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
		return $this->arrayConfig["template"]['templateaDir'].$this->file.$this->arrayConfig["template"]['suffix'];
	}

	/**
	 * @param $file
	 */

	public function show ($file) {

		$this->file = $file;

		if (!is_file($this->path())) {
			exit ('找不到对应的模板');

		}
		//编译后文件
		$compileFile = YIN_PATH.'/'.$this->arrayConfig["template"]['compiledir'].'/'.md5($file).$this->arrayConfig["template"]['suffix_cache'];
		if (!is_file($compileFile)) {
			mkdir($this->arrayConfig["template"]['compiledir']);//生成缓存文件夹
			extract($this->value);
			$this->compileTool->compile($this->path(),$compileFile);//把内容写到文件中
			include_once($compileFile);//读取
			//echo $compileFile;
		} else {
			extract($this->value);
			//echo YIN_PATH.'/'.$this->path();
			include_once(YIN_PATH.'/'.$this->path());
			 //readfile(YIN_PATH.'/'.$this->path());

		}

	}


}