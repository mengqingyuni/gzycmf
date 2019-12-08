<?php
/**
 *异步服务器
 * Created by SwoolsTcp.php.
 * User: gongzhiyang
 * Date: 18/12/10
 * Time: 9:56 下午.
 */
$serv = new Swoole_server('0.0.0.0', 9501);
//设置异步进程数
$set = $serv->set(['task_worker_num'=>4]);
//投递异步任务
$serv->on(
    'receive',
    function ($serv, $fd, $from_id, $data) {
        $task_id = $serv->task($data); //异步id
        echo "异步ID：$task_id \n";
    }
);

//处理异步任务
$serv->on(
    'task',
    function ($serv, $task_id, $from_id, $data) {
        echo "执行异步ID：$task_id \n";
        $serv->finish("$data");
    }
);
//处理结果

$serv->on('finish', function ($serv, $task_id, $data) {
    echo '执行完成';
});

$serv->start();
