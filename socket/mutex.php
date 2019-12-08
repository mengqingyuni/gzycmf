<?php
/**
 * 互斥所 主要用于写的操作
 * Created by mutex.php.
 * User: gongzhiyang
 * Date: 18/12/12
 * Time: 2:31 下午.
 */
//创建对象 互斥所
$lock = new swoole_lock(SWOOLE_MUTEX);
echo "创建互斥 \n";
//开始锁定 主进程
$lock->lock();
if (pcntl_fork() > 0) {
    //主进程
    sleep(1);
    //解锁
    $lock->unlock();
} else {
    //子进程
    echo "子进程等待解锁 \n";
    $lock->lock(); //上锁
    echo "子进程释放所 \n";
    $lock->unlock();
}

echo '主进程 释放锁';
unset($lock);
sleep(1);
exit('子进程退出');
