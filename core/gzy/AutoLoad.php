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
		//echo YIN_PATH; echo "<br/>";

//		// "Linux需要转义斜杠";
		$file = str_replace('\\','/',$file);
		$path = pathinfo($file);
		//print_r($path) ;
		$file = $path["dirname"].'/'.$path["basename"];
	//	echo $file ."<br>";    //这句话是为了调试使用

		if (is_file($file)) {

			//var_dump(str_replace('\\','/',pathinfo($file)["dirname"].'/'.pathinfo($file)["basename"])) ; echo "<br/>";
			include_once($file);
		}

	}


	private function getFile($file) {


	}
}