<?php
/**
 * Created by function.php.
 * User: gongzhiyang
 * Date: 18/12/1
 * Time: 7:14 下午
 */
/**
 * @param $type 类型
 * @param $value 名称
 */
function get($value=""){
	//echo "===========";
     // echo $_GET[ $value ];

	try {
		if (!empty($value)) {
			//echo $value;

			$get = $_SERVER["REQUEST_METHOD"];

			if (C("url_route")=="PATH_INFO") {
				//echo C("url_route");
					$pathInfo = trim($_SERVER["REQUEST_URI"],'/');

					$parm = explode('/',$pathInfo,5)["4"];
                    //var_dump($pathInfo);
				    if (isset($parm)) {
						$list = explode('/',$parm);
						foreach ($list as $key=>$val) {

							if ($val==$value) {

								return @filter_str($list[$key+1]);

							}

						}
					}


			} else {

				//echo "======";exit;

				return @filter_str ( $_GET[ $value ] );

			}

		} else {

				die ("Error!: " . "类型不匹配！" . "<br/>");
		}

	} catch (\PDOException $e) {

		die ("Error!: " . $e->getMessage() . "<br/>");

	}


	//return $pathInfo;
}

/**
 * @param string $value
 * @return string
 * post
 */

function post ($value="") {

		try {
			if (!empty($value)) {

				return @filter_str ( $_POST[ $value ] );


			} else {
				die ( "Error!: " . "类型不匹配！" . "<br/>" );
			}


	} catch (\PDOException $e) {

		die ("Error!: " . $e->getMessage() . "<br/>");

	}



}

/**
 * @return mixed
 */

function put () {
	static $_PUT	=	null;

	if(is_null($_PUT)){
		@parse_str(file_get_contents('php://input'), $_PUT);
	}
	$input 	=	$_PUT;
    return $input;
}



/**
 * 安全过滤类-字符串过滤 过滤特殊有危害字符
 *  Controller中使用方法：$this->controller->filter_str($value)
 * @param  string $value 需要过滤的值
 * @return string
 */
    function filter_str($value="") {
		$value = str_replace(array("\0","%00","\r"), '', $value);
		$value = preg_replace(array('/[\\x00-\\x08\\x0B\\x0C\\x0E-\\x1F]/','/&(?!(#[0-9]+|[a-z]+);)/is'), array('', '&amp;'), $value);
		$value = str_replace(array("%3C",'<'), '&lt;', $value);
		$value = str_replace(array("%3E",'>'), '&gt;', $value);
		$value = str_replace(array('"',"'","\t",'  '), array('&quot;','&#39;','    ','&nbsp;&nbsp;'), $value);
		return $value;
	}

/**
 * 配置函数
 * @param $type
 * @return mixed
 */

function C ($type) {
	$file = YIN_PATH."/"."config/conf.php";
	//echo $file;
	$data = include $file;

	return $data[$type];


}