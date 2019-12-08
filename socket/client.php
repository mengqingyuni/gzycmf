<?php
/**
 * 异步客户端
 * Created by client.php.
 * User: gongzhiyang
 * Date: 18/12/10
 * Time: 11:23 下午.
 */
//创建异步客户端
$cli = new swoole_client(SWOOLE_SOCK_TCP, SWOOLE_SOCK_ASYNC);

//注册链接成功回调
$cli->on('connect', function ($cli) {
    $cli->send("hello \n");
});

//注册数据接收 $cli 服务端信息
$cli->on('receive', function ($cli, $data) {
    echo "$data \n";
    sleep(1);
    $cli->send("hello\n");
});

//注册失败
$cli->on('error', function ($cli) {
    echo "注册失败\n";
});

//关闭
$cli->on('close', function ($cli) {
    echo "closed\n";
});

$cli->connect('192.168.0.107', 9878, 0.5);
