<?php
/**
 *ip
 * Created by dns.php.
 * User: gongzhiyang
 * Date: 18/12/12
 * Time: 2:55 下午
 */

swoole_async_dns_lookup("www.baidu.com", function($host, $ip){
	echo "{$host} : {$ip}\n";
});


