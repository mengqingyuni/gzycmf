<?php
/**
 * web服务端
 * Created by serversocket.php.
 * User: gongzhiyang
 * Date: 18/12/9
 * Time: 11:51 下午.
 */
$ws = new swoole_webSocket_server('0.0.0.0', 9502);

$ws->on('open', function ($ws, $request) {
    echo "server: handshake success with fd{$request->fd}\n";
    $GLOBALS['fd'][$request->fd]['id'] = $request->fd; //设置用户id
    $GLOBALS['fd'][$request->fd]['name'] = '匿名用名'; //设置用户id
});

$ws->on('message', function ($ws, $request) {
    echo "receive from {$request->fd}:{$request->data},opcode:{$request->opcode},fin:{$request->finish}\n";
    $msg = $GLOBALS['fd'][$request->fd]['name'].':'.$request->data."\n";

    if (strstr($request->data, '#name#')) {
        $GLOBALS['fd'][$request->fd]['name'] = str_replace('#name#', '', $request->data);
    } else {
        //发送客户端
        foreach ($GLOBALS['fd'] as $i) {
            $ws->push($i['id'], $msg);
        }
    }
});

$ws->on('close', function ($ws, $request) {
    echo "client {$request} closed\n";
    unset($GLOBALS['fd'][$request]);
});

$ws->start();
