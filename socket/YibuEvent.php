<?php
/**
 * Created by YibuEvent.php.
 * User: gongzhiyang
 * Date: 18/12/12
 * Time: 6:44 下午
 */

$fp = stream_socket_client("tcp://www.qq.com:80", $errno, $errstr, 30);
if (!$fp) {
	echo "$errstr ($errno)<br />\n";
} else {
	fwrite($fp, "GET / HTTP/1.1\r\nHost:www.qq.com\r\n\r\n");
	swoole_event_add($fp,function($fp){

			$fgets = fread($fp, 8192);
			var_dump($fgets);


		swoole_event_del($fp);
		fclose($fp);
	});


}

echo "这个先执行完成\n";