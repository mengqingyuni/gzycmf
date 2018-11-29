<?php
/**
 * 模板接口
 * Created by Template.php.
 * User: gongzhiyang
 * Date: 18/11/29
 * Time: 8:50 下午
 */

namespace core\gzy\base;


interface Template
{
	/**
	 * @param $key
	 * @param $value
	 * @return mixed
	 */
	public function assign ($key,$value);

	/**
	 * @param $file
	 * @return mixed
	 */
	public function show ($file);

}