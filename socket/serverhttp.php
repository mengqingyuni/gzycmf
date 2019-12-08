<?php
/**
 * 创建http服务器
 * Created by serverhttp.php.
 * User: gongzhiyang
 * Date: 18/12/9
 * Time: 10:28 下午.
 */
$http = new swoole_http_server('127.0.0.1', 9503);
$http->on('request', function ($request, $response) {
    $response->end('<h1>Hello Swoole. #'.rand(1000, 9999).'</h1>');
});
$http->start();
