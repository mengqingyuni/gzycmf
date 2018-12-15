<?php
/**
 * Created by server.php.
 * User: gongzhiyang
 * Date: 18/12/4
 * Time: 1:11 上午
 */

$serv = new Swoole_server('0.0.0.0', 9501, SWOOLE_PROCESS, SWOOLE_SOCK_TCP);;
$serv->on('Connect', function($serv,$fd){
	echo "建立连接";
});

$serv->on('Receive', function($serv,$fd,$from_id,$data){
	echo "接收到数据\n";
	//var_dump($data);
});

$serv->on('Close', function($serv,$fd){
	echo "连接关闭\n";

});
$serv->start();