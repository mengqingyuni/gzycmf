<?php
/**
 * 创建进程
 * Created by process.php.
 * User: gongzhiyang
 * Date: 18/12/11
 * Time: 8:13 下午.
 */
 //进程数组
$workers = [];
$worker_num = 3;
$r = [];
for ($i = 0; $i < $worker_num; $i++) {
    $process = new swoole_process('doprocess', false, false);
    $process->useQueue();
    $pid = $process->start(); //启动进程 并获取进程id
    $workers[$pid] = $process;
}

//进程对应执行的函数
function doprocess(swoole_process $process)
{
//     $pid = $process->pid;
//	 $process->write("PID:$pid");
//	 $callback = $process->callback;
    $recv = $process->pop(); //提取数据
    echo "写入：$recv \n";
    sleep(5);
    $process->exit(0);
}

//添加进程事件 向每个子进程添加需要执行的动作
foreach ($workers as $pid=>$process) {

    //添加
    //	swoole_event_add($process->pipe,function($pipe) use($process){
    //			$data = $process->read();
    //			echo "接收到：$data \n";
    //		    var_dump($process);
    //	});
    $r = ['dd'=>1];

    //主进程向子进程添加数据

    $process->push(json_encode($r));
}

//等待z子进程结束
for ($i = 0; $i < $worker_num; $i++) {
    $ret = swoole_process::wait();
    $pid = $ret['pid'];
    unset($workers[$pid]);
    echo '子进程退出';
}
