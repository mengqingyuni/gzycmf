<?php
/**
 * Created by server.php.
 * User: gongzhiyang
 * Date: 18/12/4
 * Time: 1:11 上午.
 */
$serv = new Swoole_server('0.0.0.0', 9506, SWOOLE_PROCESS, SWOOLE_SOCK_UDP);

$serv->on('Connect', function ($serv, $data, $fd) {
    $serv->sendto($fd['address'], $fd['port'], "Server:$data");
    //var_dump($fd);
});

$serv->start();
