<?php
/**
 * Created by CompileConfig.php.
 * User: gongzhiyang
 * Date: 18/11/25
 * Time: 10:29 下午
 * 模板编译类工具
 */

namespace core\gzy\base;


class CompileConfig
{
	private $template;//待编译的文件
	private $content;//需要替换的文本
	private $comfile;//编译后的文件
	private $left = '{';
	private $right= '}';
	private $value= []; //值栈

	public function __construct () {

	}

	/**
	 * @param $source     数据
	 * @param $destFile   文件
	 */
	public function compile ($source,$destFile) {
		file_put_contents($destFile,file_get_contents($source));

	}

}