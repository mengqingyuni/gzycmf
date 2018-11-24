<?php
/**
 * Created by BaseController.php.
 * User: gongzhiyang
 * Date: 18/11/24
 * Time: 9:18 下午
 */

namespace core\gzy\controller;

class Controller {

	/**
	 * 控制器 重定向
	 * @param string  $url   跳转的URL路径
	 * @param int     $time  多少秒后跳转
	 */
	public function redirect($url, $time = 0) {
		if (!headers_sent()) {
			//如果报头未发送，则发送一个
			if ($time === 0) header("Location: ".$url);
			header("refresh:" . $time . ";url=" .$url. "");
		} else {
			exit("<meta http-equiv='Refresh' content='" . $time . ";URL=" .$url. "'>");
		}
	}

	/**
	 *  数据基础验证-是否是Email 验证：xxx@qq.com
	 *  Controller中使用方法：$this->is_email($value)
	 *  @param  string $value 需要验证的值
	 *  @return bool
	 */
	public function is_email($value) {
		return preg_match('/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/', trim($value));
	}

	/**
	 * 数据基础验证-手机号
	 * @param $value
	 * @return int
	 */
	public function is_phone($value) {
		return preg_match('/^1[34578]\d{9}$/', trim($value));
	}

	/**
	 * 获取参数 如果是GET $type == 'G'
	 * @param $value
	 * @param $type
	 * @return string
	 */
	public function getParams($value,$type) {
		if($type == 'G') {
			return $this->filter_str($_GET[$value]);
		} elseif($type == 'P') {
			return $this->filter_str($_POST[$value]);
		}
	}

	/**
	 * 安全过滤类-字符串过滤 过滤特殊有危害字符
	 *  Controller中使用方法：$this->controller->filter_str($value)
	 * @param  string $value 需要过滤的值
	 * @return string
	 */
	public function filter_str($value) {
		$value = str_replace(array("\0","%00","\r"), '', $value);
		$value = preg_replace(array('/[\\x00-\\x08\\x0B\\x0C\\x0E-\\x1F]/','/&(?!(#[0-9]+|[a-z]+);)/is'), array('', '&amp;'), $value);
		$value = str_replace(array("%3C",'<'), '&lt;', $value);
		$value = str_replace(array("%3E",'>'), '&gt;', $value);
		$value = str_replace(array('"',"'","\t",'  '), array('&quot;','&#39;','    ','&nbsp;&nbsp;'), $value);
		return $value;
	}



}

