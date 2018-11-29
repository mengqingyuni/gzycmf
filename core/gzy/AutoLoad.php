<?php
/**
 * Created by AutoLoad.php.
 * User: gongzhiyang
 * Date: 18/11/15
 * Time: 11:47 下午
 */

namespace core\gzy;


class AutoLoad
{
	public static function loadprint($class){
		$file = YIN_PATH."/".$class.".php";
		//echo $file;
		// "Linux需要转义斜杠";
		$file = str_replace('\\','/',$file);
		//echo $file."<br>";    //这句话是为了调试使用
		if (is_file($file)) {
			include_once($file);
		}
	}
}